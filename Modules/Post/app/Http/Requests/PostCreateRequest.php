<?php

namespace Modules\Post\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048', 'required_without:description'],
            'description' => ['nullable','max:300', 'required_without:image'],
            'visibility' => ['required'],
            'feature' => ['nullable', 'boolean'],
        ];
    }

    public function messages()
    {
        return [
            'visibility.required' => 'Görüntüleme ayarı zorunludur.',
            'description.max' => 'İçerik en fazla 300 karakter olabilir.',
            'description.required_without' => 'İçerik veya görselden en az biri gereklidir.',
            'image.required_without' => 'İçerik veya görselden en az biri gereklidir.',
            'image.image' => 'Yüklenen dosya resim olmalıdır.',
            'image.mimes' => 'İzin verilen formatlar: .png, .webp, .jpg, .jpeg',
            'image.max' => 'Max boyut: 2048 KB',
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
