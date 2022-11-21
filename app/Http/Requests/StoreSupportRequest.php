<?php

namespace App\Http\Requests;

use App\Models\Support;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSupportRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(Support $support)
    {
        return [
            'lesson' => ['required', 'exists:lessons,id', 'uuid'],
            'qa' => ['required', Rule::in(array_keys($support->qaStatus))],
            'description' => ['required', 'string', 'min:1', 'max:10000'],
        ];
    }
}
