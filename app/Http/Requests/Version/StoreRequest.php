<?php

namespace App\Http\Requests\Version;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required|string',
            'date'=>'required|string',
            'feature'=>'required|string',
            'link'=>'required|string',
            'size'=>'string',
            'main_image' => 'file',
        ];
    }
}
