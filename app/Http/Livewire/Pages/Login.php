<?php

namespace App\Http\Livewire\Pages;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use WireUi\Traits\Actions;

class Login extends Component
{
    use Actions;

    public string $email = '';
    public string $password = '';
    public bool $rememberMe = false;

    protected $rules = [
        'email' => 'required|string|email|exists:users,email',
        'password' => 'required|string|min:8'
    ];

    public function login() {
        $this->resetValidation();
        $this->validate();

        if (Auth::attempt(
            [
                'email' => $this->email,
                'password' => $this->password
            ],
            $this->rememberMe))
        {
            return redirect()->route('home');
        }

        $this->notification()->error(
            $title = "Erro",
            $description = "Email ou senha inválidos."
        );
    }

    public function render()
    {
        return view('livewire.pages.login');
    }
}
