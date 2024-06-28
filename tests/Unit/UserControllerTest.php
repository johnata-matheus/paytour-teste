<?php

namespace Tests\Unit;

use App\Mail\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    
    public function test_criar_user()
    {

        $data = [
            'nome' => $this->faker->name,
            'email' => $this->faker->email,
            'telefone' => '(11) 123456789', 
            'cargo_desejado' => 'Desenvolvedor',
            'observacoes' => null,
            'escolaridade' => 'Ensino Superior',
            'arquivo' => UploadedFile::fake()->create('curriculo.pdf'),
            'data_envio' => now(),
        ];

        $response = $this->post('/user', $data);

        $this->assertDatabaseHas('users', [
            'email' => $data['email'],
            'nome' => $data['nome'],
            'telefone' => '11123456789',
            'cargo_desejado' => 'Desenvolvedor',
            'observacoes' => null
        ]);
    }

    public function test_criar_escolaridade()
    {

        $data = [
            'nome' => $this->faker->name,
            'email' => $this->faker->email,
            'telefone' => '(11) 123456789', 
            'cargo_desejado' => 'Desenvolvedor',
            'observacoes' => null,
            'escolaridade' => 'Ensino Superior',
            'arquivo' => UploadedFile::fake()->create('curriculo.pdf'),
            'data_envio' => now(),
        ];
    
        $response = $this->post('/user', $data);
    
        $user = User::where('email', $data['email'])->first();
    
        $this->assertDatabaseHas('escolaridades', [
            'escolaridade' => $data['escolaridade'],
            'user_id' => $user->id
        ]);
    }

    public function test_criar_curriculo()
    {

        $data = [
            'nome' => $this->faker->name,
            'email' => $this->faker->email,
            'telefone' => '(11) 123456789', 
            'cargo_desejado' => 'Desenvolvedor',
            'observacoes' => null,
            'escolaridade' => 'Ensino Superior',
            'arquivo' => UploadedFile::fake()->create('curriculo.pdf'),
            'data_envio' => now(),
            'ip_evio' => '127.0.0.1'
        ];

        $response = $this->post('/user', $data);

        $user = User::where('email', $data['email'])->first();

        $this->assertDatabaseHas('curriculos', [
            'arquivo' => 'curriculo.pdf',
            'user_id' => $user->id,
            'ip_envio' => '127.0.0.1'
        ]);
    }


    public function test_enviar_email()
    {
        Mail::fake();

        $data = [
            'nome' => $this->faker->name,
            'email' => $this->faker->email,
            'telefone' => '(11) 123456789', 
            'cargo_desejado' => 'Desenvolvedor',
            'observacoes' => null,
            'escolaridade' => 'Ensino Superior',
            'arquivo' => UploadedFile::fake()->create('curriculo.pdf'),
            'data_envio' => now(),
        ];

        $response = $this->post('/user', $data);

        Mail::assertSent(Contact::class, function ($mail) use ($data) {
            return $mail->hasTo($data['email']);
        });
    }
}
