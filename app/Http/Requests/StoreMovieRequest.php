<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
        return [
            'title' => 'required',
            'release_date' => 'required',
            'description' => 'required|min:5',
        ];
    }

    public function messages():array{
        return [
            'title.required' => 'Judul tidak boleh kosong',
            'description.required' => 'sinopsis cerita harus diisi',
            'description.min' => 'sinopsis minimal 5 kata',
            'release_date.required' => 'Harap mengisi tanggal rilis film',
        ];
    }
}
