<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ArticleRequest
 *
 * @package App\Http\Requests
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
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'summary' => 'required|max:255',
            'content' => 'required',
            'status' => 'required',
            'image',
            'slug' => 'required|max:255',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Mandatory.',
            'summary.required'  => 'Mandatory.',
            'content.required'  => 'Mandatory.',
            'status.required'  => 'Mandatory.',
            'slug.required'  => 'Mandatory.',
        ];
    }
}
