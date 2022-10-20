<?php

namespace App\Http\Livewire;

use App\Models\utilisateur;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ManageData extends Component
{

    use WithPagination;

    protected $paginationTheme='bootstrap';
    
    public utilisateur $information;
    public $liste=false;
    public $editStatut=false;
    public $notification=['',''];

    // Règle de validation du formulaire
    protected $rules = [
        'information.nom'=>'required',
        'information.email'=>'required'
    ];

    // Initialisation de l'instance utilisée pour mapper nos données
    public function mount(){
        $this->information=utilisateur::make();
    } 
    

    // Fonction de sauvegarde et de mise à jour des informarions via le formulaire
    public function saveData(){

        
        try {

            // Test d'existance d'une adresse mail dans la base de données
            $checkEmail=DB::table('utilisateurs')
            ->whereEmail($this->information->email)
            ->first();

            if ($checkEmail) {
                // Au cas ou l'adresse mail existe et que nous ne soyons pas en modification.
                if (!$this->editStatut) {
                    session()->flash('error', 'cette adresse mail existe déjà!');

                // Cas ou l'adresse mail existe mais que nous sommes en modification, on compare l'id provenant de la vérification
                // faites plus haut ($checkEmail->id) de l'id provenant de l'information qu'on veut modifier.
                // si elle se ressemble cela signifie qu'on a à faire au même enregistrement au cas contraire il s'agit de deux
                // enregistrements différents donc on ne modifie pas. et on notifie l'utilisateur.

                } elseif ($checkEmail->id==$this->information->id) {

                // Sauvegarde pour le cas d'une modification    
                    $this->information->save();
                    $this->information=utilisateur::make();
                    $this->liste=true;
                    session()->flash('success', 'Modification effectué avec succès!');

                } else{
                    session()->flash('error', 'cette adresse mail existe déjà pour un autre utilisateur!'); 
                }
                
            } else {
                // Sauvegarde pour un nouvel enregistrement
                $this->information->save();
                $this->information=utilisateur::make();
                $this->resetPage();
                $this->liste=true;
                session()->flash('success', 'Enregistrement effectué avec succès!');

            }  
        } catch (\Throwable $th) {
            session()->flash('error', 'erreur lors de l\'enregistrement.');

        }
    }


    // retourne les informations de la table utillisateurs enregistrées paginé en bloc de 5 à 5
    public function getAllInformationProperty(){
        return utilisateur::orderBy('id','desc')
        ->paginate(5);
    }


    // Fonction de suppression d'un utilisateur enregistré
    public function delete($ident){
        try {
            $checkEmail=DB::table('utilisateurs')
            ->delete($ident);

            session()->flash('success', 'suppression éffectuée avec succès!');
        } catch (\Throwable $th) {
            dd($th);
        }
    }


    public function updatedListe(){
        if($this->liste){
            $this->resetPage();
        }
    }


    // Fonction de d'initialisation de mise à jour d'un utilisateur enregistré
    public function edit($ident){
        $this->information=utilisateur::find($ident);
        $this->editStatut=true;
        $this->liste=false;


    }
    

    
    public function render()
    {
        return view('livewire.manage-data');
    }
}
