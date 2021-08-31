<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
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
            'text' => [
                'required',
                'string',
                'min:20',
            ]
        ];
    }

    public function messages()
    {
        return [
            'text.required' => 'Необходимо что-то написать перед отправкой  ',
            'text.min' => 'Текс обратной связи должен содержать минимум 20 символов',
        ];
    }
}
