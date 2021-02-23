<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ArticleRequest
 *
 * @package App\Http\Requests
 *
 * @author Ali, Muamar
 */
class ArticleRequest extends FormRequest
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
            'title' => 'required|max:255',
            'published_at' => 'required',
            'summary' => 'required|max:255',
            'content' => 'required',
            'status' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
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
            'title.required' => 'Mandatory.',
            'published_at.required' => 'Mandatory.',
            'summary.required'  => 'Mandatory.',
            'content.required'  => 'Mandatory.',
            'status.required'  => 'Mandatory.',
        ];
    }
}
