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
            'comment' => 'required|string|min:20',
            'rating' => 'nullable|numeric|between:1,5',
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
            'rating.numeric' => 'Рейтинг должен быть числом',
            'rating.between' => 'Рейтинг должен принимать значение от 1 до 5',
        ];
    }
}
