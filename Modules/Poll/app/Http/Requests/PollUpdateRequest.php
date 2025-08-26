<?php

namespace Modules\Poll\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PollUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            // validation rules
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
