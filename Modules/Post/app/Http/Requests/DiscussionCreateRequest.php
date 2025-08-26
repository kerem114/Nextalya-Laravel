<?php

namespace Modules\Post\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscussionCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'title' => ['required'],
            'description' => ['nullable','max:300'],
            'visibility' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Tartışma başlığı zorunludur.',
            'visibility.required' => 'Görüntüleme ayarı zorunludur.',
            'description.max' => 'İçerik en fazla 300 karakter olabilir.',
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
