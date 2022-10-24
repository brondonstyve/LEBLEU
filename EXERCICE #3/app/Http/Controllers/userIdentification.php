<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userIdentification extends Controller
{
    public function index(){
        return view('connexion');
    }


    //fonction de deconnexion d'un utilisateur
    public function deconnexion(){
        auth()->logout();
        session()->invalidate();
        return redirect()->route('login');
    }
}
