<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $user = User::create($data);

        Mail::to($request->email)->send(new Contact([
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'arquivo' => $request->file('arquivo'),
            'telefone' => $request->input('telefone'),
            'cargo_desejado' => $request->input('cargo_desejado'),
            'escolaridade' => $request->input('escolaridade'),
            'observacoes' => $request->input('observacoes'),
            'data_envio' => $request->input('data_envio')
        ]));

        return redirect('/user');
    }
}
