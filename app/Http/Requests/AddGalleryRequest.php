<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddGalleryRequest extends FormRequest
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
            'title' => [
                'required',
                'string',
                'min:10',
            ],
            'image' => [
                'required',
                'file',
            ],
            'category' => [
                'numeric',
            ]
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Необходимо придумать название',
            'title.min' => 'Название должено содержать минимум 10 символов',
            'author_id.required' => 'Автор должен быть указан',
            'image.required' => 'Картинка обязательна',
            'image.file' => 'Загружить нужно картинку',
        ];
    }
}
