<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateartistRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();

        if ($method == 'PUT') {
            return [
                'name' => 'required|string|max:255',
                'id' => 'sometimes|integer|unique:artists,id',
            ];
        } elseif ($method == 'PATCH') {
            return [
                'name' => 'sometimes|string|max:255',
                'id' => 'sometimes|integer|unique:artists,id',
            ];
        }
    }
}
