<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserFormRequest extends FormRequest
{

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
            'nome' => 'required|string|max:255|min:3',
            'email' => [
                'required',
                'email'
            ],
            'telefone' => [
                'required',
                'regex:/^\(\d{2}\) \d\d{4}\d{4}$/',
                'size:14'
            ],
            'cargo_desejado' => [
                'required',
                'string',
                'max:500',
                'min:3'
            ],
            'escolaridade' => [
                'required'
            ],
            'observacoes' => [
                'nullable', 
                'string',
                'max:500'
            ],
            'arquivo' => [
                'required',
                'file',
                'mimes:doc,docx,pdf',
                'max:1024' 
            ],
            'data_envio' => [
                'required',
                'date',
                'after:today' 
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.string' => 'O campo nome deve ser uma string.',
            'nome.max' => 'O campo nome não pode exceder 255 caracteres.',
            'nome.min' => 'O campo nome deve ter pelo menos 3 caracteres.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O campo email deve ser um endereço de e-mail válido.',
            'telefone.required' => 'O campo telefone é obrigatório.',
            'telefone.regex' => 'O telefone deve ter o formato (XX) XXXXXXXXX.',
            'telefone.size' => 'O telefone deve ter 14 caracteres, com parênteses e espaços.',
            'cargo_desejado.required' => 'O campo cargo desejado é obrigatório.',
            'cargo_desejado.string' => 'O campo cargo desejado deve ser uma string.',
            'cargo_desejado.max' => 'O campo cargo desejado não pode ter mais que 500 caracteres.',
            'cargo_desejado.min' => 'O campo cargo desejado deve ter no mínimo 3 caracteres.',
            'escolaridade.required' => 'O campo escolaridade é obrigatório.',
            'observacoes.nullable' => 'O campo observações é opcional.',
            'observacoes.string' => 'O campo observações deve ser uma string.',
            'observacoes.max' => 'O campo observações não pode ter mais que 500 caracteres.',
            'arquivo.required' => 'O campo arquivo é obrigatório.',
            'arquivo.file' => 'O arquivo enviado não é válido.',
            'arquivo.mimes' => 'O arquivo deve estar no formato .doc, .docx ou .pdf.',
            'arquivo.max' => 'O arquivo não pode ser maior que 1 MB.',
            'data_envio.required' => 'O campo data de envio é obrigatório.',
            'data_envio.date' => 'A data de envio fornecida não é válida.',
            'data_envio.after' => 'A data de envio deve ser uma data futura.'
        ];
    }

}
