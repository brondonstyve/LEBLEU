<?php

namespace App\Http\Livewire;

use App\Models\compte;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserOperation extends Component
{

    public $vueFormCreateUser = false;
    public compte $compte;
    public $email;
    public $password;
    public $confirmPassword;


    //règles de validation du formulaire de création et de connexion
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function mount(){
        $this->compte=compte::make();
    }

    //fonction de cration d'un compte
    public function create()
    {
        $this->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ]
        );
        try {
            $this->validate();
            $checkEmail = DB::table('comptes')
                ->whereEmail($this->email)
                ->first();
            if ($checkEmail) {
                session()->flash('error', 'Cette adresse mail existe déjà!');
            } else {
                
                $this->compte->password = bcrypt($this->password);
                $this->compte->email = $this->email;
                $this->compte->save();
                $this->confirmPassword = null;
                $this->vueFormCreateUser = false;
                $this->password = null;
                $this->compte=compte::make();
                session()->flash('success', 'Enregistrement effectué avec succès! Connectez vous ici');
            }
        } catch (\Throwable $th) {
            session()->flash('error','une erreur s\'est produite lors de l\'enregistrement!');
        }
    }



    //fonction de connexion d'un utilisateur
    public function connection()
    {
        try {
            $this->validate(
                [
                    'email' => 'email',
                    'password' => 'required',
                ]
            );
            if (auth()->attempt(['email' => $this->email, 'password' => $this->password])) {
                return redirect()->route('enregistrement');
            } else {
                session()->flash('error', 'Adresse email ou mot de passe incorrecte! Veuillez recommencer');
            }
        } catch (\Throwable $th) {
            session()->flash('error', 'une erreur s\'est produite lors de votre tentative de connexion!');
        }
    }

    //Actions éffectuées lors du changement de vue (création ou connexion)
    public function updatedVueFormCreateUser()
    {
        $this->email = null;
        $this->password = null;
        $this->compte=compte::make();
    }

    public function render()
    {
        return view('livewire.user-operation');
    }
}
