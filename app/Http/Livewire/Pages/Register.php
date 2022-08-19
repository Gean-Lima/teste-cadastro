<?php

namespace App\Http\Livewire\Pages;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use WireUi\Traits\Actions;

class Register extends Component
{
    use Actions;

    public string $name = "";
    public string $email = "";
    public string $password = "";

    protected $rules = [
        "name" => 'required|string|max:255',
        "email" => 'required|string|email|unique:users,email',
        "password" => 'required|string|min:8'
    ];

    public function register() {
        $this->resetValidation();
        $this->validate();

        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);

        $status = $user->save();

        if (!$status) {
            $this->notification()->error(
                $title = 'Houve um erro',
                $description = 'Houve um erro desconhecido ao criar sua conta.'
            );

            return;
        }

        session()->flash('account_created', 'Conta criada com sucesso! Não perca tempo e faça login agora.');
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.pages.register');
    }
}
