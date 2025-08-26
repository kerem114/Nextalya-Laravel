<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductManualCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'description' => ['required','max:300'],
            'title' => ['required'],
            'price' => ['required'],
            'topcat_id' => ['required'],
            'platform' => ['nullable'],
            'url' => ['nullable', 'url'],
            'features' => ['nullable','max:50'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Başlık alanı zorunludur.',
            'description.max' => 'İçerik en fazla 300 karakter olabilir.',
            'description.required' => 'İçerik alanı doldurmak zorunludur.',
            'topcat_id.required' => 'Kategori seçimi zorunludur.',
            'image.required' => 'Görsel zorunludur.',
            'image.image' => 'Yüklenen dosya resim olmalıdır.',
            'image.mimes' => 'İzin verilen formatlar: .png, .webp, .jpg, .jpeg',
            'image.max' => 'Max boyut: 2048 KB',
            'price.required' => 'Fiyat alanı zorunludur.',
            'features.max' => 'Özellik seçeneği en fazla 50 karakter olabilir.',
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
