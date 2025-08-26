<?php

namespace Modules\Post\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'description' => ['nullable','max:300'],
            'visibility' => ['required'],
            'feature' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'visibility.required' => 'Görüntüleme ayarı zorunludur.',
            'feature.required' => 'Öne çıkarma ayarı zorunludur.',
            'description.max' => 'İçerik en fazla 300 karakter olabilir.',
            'image.image' => 'Yüklenen dosya resim olmalıdır',
            'image.mimes' => 'İzin verilen: .png, .webp, .jpg, .jpeg',
            'image.max' => 'Max boyut: 2048 MB',

        ];
    }

    /**
    * Determine if the user is authorized to make this request.
    */
    public function authorize(): bool
    {
        return true;
    }
}
