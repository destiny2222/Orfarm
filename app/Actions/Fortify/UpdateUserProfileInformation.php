<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Drivers\Gd\Driver;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Illuminate\Http\Request;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input): void
    {
        try{
            Validator::make($input, [
                'name' => ['required', 'string', 'max:255'],
                'phone'=>['required','string'], 
                'address' => ['required','string'],
                'city' => ['required','string'],
                'state' => ['required','string'],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique('users')->ignore($user->id),
                ],
               'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            ])->validateWithBag('updateProfileInformation');


            
    
            // resize image with intervention image version 3
            if (request()->hasFile('image')) {
                $image = request()->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                
                $manager = new ImageManager(new Driver());
                $processedImage = $manager->read($image);
                $processedImage->resize(300, 300);
                $processedImage->save(public_path('profile/') . $imageName);
            }
    
            if ($input['email'] !== $user->email &&
                $user instanceof MustVerifyEmail) {
                $this->updateVerifiedUser($user, $input);
            } else {
                $user->forceFill([
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'phone' => $input['phone'],
                    'address' => $input['address'],
                    'city' => $input['city'],
                    'state' => $input['state'],
                    'image' => $imageName ?? $user->image,
                ])->save();
                
                // success message
                session()->flash('success', 'Profile Updated Successfully!');
            }
        }catch(\Exception $exception){
            Log::error($exception->getMessage());
            session()->flash('error', 'An error occurred while updating your profile: ' . $exception->getMessage());
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}