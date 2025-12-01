<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateplaylistRequest extends FormRequest
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
                'user_id' => 'required|integer|exists:users,id',
                'title' => 'required|string|max:255',
            ];
        } elseif ($method == 'PATCH') {
            return [
                'user_id' => 'sometimes|integer|exists:users,id',
                'title' => 'sometimes|string|max:255',
            ];
        }
    }
}
