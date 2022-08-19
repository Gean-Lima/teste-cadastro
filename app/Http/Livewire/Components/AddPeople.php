<?php

namespace App\Http\Livewire\Components;

use App\Models\Peoples;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use WireUi\Traits\Actions;

class AddPeople extends Component
{
    use Actions;

    public bool $modal = false;

    public $listUF = LIST_UF;

    public $name;
    public $email;
    public $zip_code;
    public $city;
    public $state;
    public $street;
    public $neighborhood;

    protected function rules() {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:peoples,email',
            'zip_code' => 'required|string|formato_cep',
            'city' => 'required|string|max:255',
            'state' => 'required|string|uf',
            'street' => 'required|string|max:255',
            'neighborhood' => 'required|string|max:255'
        ];
    }

    public function updatedModal() {
        $this->reset(
            'name',
            'email',
            'zip_code',
            'city',
            'state',
            'street',
            'neighborhood'
        );
        $this->resetValidation();
    }

    public function registerPeople() {
        $this->resetValidation();
        $this->validate();

        $people = new Peoples();

        $people->user_id = Auth::user()->id;
        $people->name = $this->name;
        $people->email = $this->email;
        $people->zip_code = $this->zip_code;
        $people->city = $this->city;
        $people->state = $this->state;
        $people->street = $this->street;
        $people->neighborhood = $this->neighborhood;

        $status = $people->save();

        if (!$status) {
            $this->notification()->error(
                $title = "Erro",
                $description = "Não foi possivel cadastrar."
            );
            return;
        }

        $this->emit('updatePeoples');

        $this->notification()->success(
            $title = "Cadastrado com sucesso!",
            $description = "Nova pessoa cadastrada com sucesso."
        );

        $this->modal = false;
    }

    public function searchCEP() {
        $this->resetValidation();
        $this->validateOnly('zip_code');

        try {
            $response = Http::get("https://brasilapi.com.br/api/cep/v1/{ $this->zip_code }");

            if ($response->ok()) {
                $this->notification()->success(
                    $title = "Encontramos!",
                    $description = "Alguns dados foram encontrados com o cep informado."
                );

                $this->city = $response['city'];
                $this->state = $response['state'];
                $this->street = isset($response['street'])
                    ? $response['street']
                    : '';
                $this->neighborhood = isset($response['neighborhood'])
                    ? $response['neighborhood']
                    : '';

                return;
            }

            $this->notification()->error(
                $title = "Não encontrado",
                $description = "Não encontramos nada com o cep informado."
            );

        } catch (Exception $e) {
            $this->notification()->error(
                $title = "Erro",
                $description = "Houve um erro ao fazer a busca."
            );
        }
    }

    public function render()
    {
        return view('livewire.components.add-people');
    }
}
