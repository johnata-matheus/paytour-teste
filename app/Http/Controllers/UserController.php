<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserFormRequest;
use App\Mail\Contact;
use App\Models\Curriculo;
use App\Models\Escolaridade;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function store(StoreUserFormRequest $request)
    {
        try{
            $data = $request->all();

            $removeFormatting = str_replace(['(', ')', ' '], '', $request->telefone);
        
            $data['telefone'] = $removeFormatting;

            $user = User::create([
                'nome' => $data['nome'],
                'email' => $data['email'],
                'telefone' => $data['telefone'],
                'cargo_desejado' => $data['cargo_desejado'],
                'observacoes' => $data['observacoes'],
            ]);

            $escolaridade = Escolaridade::create([
                'escolaridade' => $data['escolaridade'],
                'user_id' => $user->id,
            ]);

            if ($request->hasFile('arquivo')) {
                $arquivo = $request->file('arquivo');
                $nomeArquivo = $arquivo->getClientOriginalName();
                $arquivo->storeAs('public/curriculos', $nomeArquivo);

                $curriculo = Curriculo::create([
                    'arquivo' => $nomeArquivo,
                    'data_envio' => now(),
                    'ip_envio' => $request->ip(),
                    'user_id' => $user->id,
                ]);
            }

            Mail::to($user->email)->send(new Contact($data));

            return back()->with('success', 'Usuário registrado com sucesso!');
        } catch(\Exception $error) { 
            return back()->with('error', 'Erro ao registrar usuário: ' . $error->getMessage());
        }
    }
}
