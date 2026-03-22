<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'subtitle' => 'required',
            'image' => 'required|image',
            'article' => 'required',
        ];
    }

    public function messages() {
        return [
            'title.required' => 'Il campo <b>Titolo</b> è obbligatorio.',
            'subtitle.required' => 'Il campo <b>Sottotitolo</b> è obbligatorio.',
            'image.required' => 'Il campo <b>Immagine</b> è obbligatorio.',
            'image.image' => 'Il <b>file da caricare</b> deve essere una immagine.',
            'article.required' => 'Il campo <b>Articolo</b> è obbligatorio.',
        ];
    }
}
