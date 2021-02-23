<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class TagRequest
 *
 * @package App\Http\Requests
 *
 * @author Ali, Muamar
 */
class TagRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'short_description' => 'required|max:255',
            'status' => 'required',
        ];
    }

    /**
     * Modify form messages.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Mandatory.',
            'short_description.required'  => 'Mandatory.',
            'status.required'  => 'Mandatory.',
        ];
    }
}
