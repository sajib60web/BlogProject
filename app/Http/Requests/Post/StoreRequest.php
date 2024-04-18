<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title'             => ['required','max:150','min:10'],
            'content'           => ['required','min:30'],
            'category_id'       => ['required','numeric'],
            // 'sub_category_id'   => ['required','numeric'],
            'post_type'         => ['required','numeric']
            // image_id
            // video_url
            // meta_title
            // meta_keywords
            // meta_description
            // tags
        ];
    }
}
