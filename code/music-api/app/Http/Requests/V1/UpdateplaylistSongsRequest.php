<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateplaylistSongsRequest extends FormRequest
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
                'playlist_id' => 'required|integer|exists:playlists,id',
                'song_id' => 'required|integer|exists:songs,id',
            ];
        } elseif ($method == 'PATCH') {
            return [
                'playlist_id' => 'sometimes|integer|exists:playlists,id',
                'song_id' => 'sometimes|integer|exists:songs,id',
            ];
        }
    }
}
