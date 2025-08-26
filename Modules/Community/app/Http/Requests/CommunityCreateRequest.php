<?php

namespace Modules\Community\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommunityCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'description' => ['required','max:300'],
            'name' => ['required','unique:communities'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Topluluk adı alanı zorunludur.',
            'name.unique' => 'Böyle bir topluluk zaten var.',
            'description.max' => 'Açıklama en fazla 300 karakter olabilir.',
            'description.required' => 'Açıklama alanı doldurmak zorunludur.',
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
