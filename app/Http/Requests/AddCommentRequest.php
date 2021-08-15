<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AddCommentRequest extends FormRequest
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
            'comment' => 'required|string|min:20'
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'comment.required' => 'Необходимо написать комментарий',
            'comment.min' => 'Комментарий должен содержать минимум 20 символов',
        ];
    }
}
