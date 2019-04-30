<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
           'post_content' => 'bail|required|max:1000', 
            'post_name' => 'bail|required|max:100',
            'post_title' => 'bail|required|max:100',
            'image' => 'image',
            'post_type'=>'bail|required|max:100'
        ];
    }
}
