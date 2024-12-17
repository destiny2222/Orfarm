<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

class UpdateUserPassword implements UpdatesUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and update the user's password.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input): void
    {
       try{
            Validator::make($input, [
                // 'current_password' => ['required', 'string', 'current_password:web'],
                'password' => $this->passwordRules(),
            ], [
                'password_confirmation.password_confirmation' => __('The provided password does not match.'),
            ])->validateWithBag('updatePassword');

            $user->forceFill([
                'password' => Hash::make($input['password']),
            ])->save();

            session()->flash('success', 'Updated Successfully!');
       }catch(\Exception $exception){
          Log::error($exception->getMessage());
          session()->flash('error', 'An error occurred while changing your password!');
       }
    }
}
