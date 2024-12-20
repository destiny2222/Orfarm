<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DealRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>['required', 'string'],
            'subtitle'=>['nullable', 'string'],
            'description'=>['nullable', 'string'],
            'offer_end_time'=>['date','nullable'],
            'is_active'=>['boolean'],
            'cta_text'=>['nullable', 'string'],
            'image'=>['nullable','mimes:png,jpg,jpeg,gif']
        ];
    }
}
