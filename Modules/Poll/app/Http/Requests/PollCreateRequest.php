<?php

namespace Modules\Poll\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PollCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required','max:50'],
            'options' => ['required','max:50'],
            'visibility' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'visibility.required' => 'Görüntüleme ayarı zorunludur.',
            'title.max' => 'Soru en fazla 50 karakter olabilir.',
            'title.required' => 'Anket sorusu zorunludur',
            'options.max' => 'Anket seçeneği en fazla 50 karakter olabilir.',
            'options.required' => 'Anket seçeneği zorunludur',
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
