<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnectionController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function signUp(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'matricule' => 'bail|required|min:6|max:6',
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'password' => 'bail|required|min:6',
            'confirmation' => 'bail|required|min:6'
        ]);
        if ($validation->fails()) {
            return view('auth.register')->withErrors($validation);
        }
        
        $data = $validation->attributes();
        $matricule = strtoupper($data['matricule']);

        if (!preg_match('/^[0-9]{2}P[0-9]{3}$/',$matricule)) {
            return view('auth.register')->withMessage("Matricule Invalide");
        }

        $user = User::where('matricule',$matricule)->get()->first();
        if ($user!=null) {
            return view('auth.register')->withMessage("Matricule déjà inscrit");
        }

        $email = $data['email'];
        if (!preg_match('/^\w+@[A-Za-z]+\.[A-Za-z]/',$email)) {
            return view('auth.register')->withMessage("Addresse Mail Invalide");
        }

        $password = $data['password'];
        if ($password!=$data['confirmation']) {
            return view('auth.register')->withMessage('Les deux mot de passes ne correspondent pas');
        }
        
        User::create([
            'matricule' => $matricule,
            'email' => $email,
            'password' => bcrypt($password),
            'nom'=> strtoupper($data['nom']),
            'prenom' => strtoupper($data['prenom'])
        ]);

        return redirect()->route('req_connexion');
    }

    public function signIn(Request $request){
        $validation = Validator::make($request->all(),[
            'matricule' => 'required|min:6|max:6',
            'password' => 'required'
        ]);

        if ($validation->fails()) {
            return view('auth.login')->withErrors($validation);
        }

        $matricule = strtoupper($validation->attributes()['matricule']);

        if (!preg_match('/^[0-9]{2}P[0-9]{3}$/', $matricule)) {
            return view('auth.login')->withMessage("Matricule Invalide");
        }

        $user = User::where('matricule',$matricule)->get()->first();

        if ($user==null||$user->delete==1) {
            return view('auth.login')->withMessage("Compte Inexistant");
        }

        if ($user->disable) {
            return view('auth.login')->withMessage("Compte desactivé. Veuillez contacter l'administrateur du système");
        }

        if (Auth::attempt(['matricule' => $user->matricule, 
                'password' => $validation->attributes()['password']],false)) {
            return redirect()->route('accueil');
        }
        return view('auth.login')->withMessage("Mot de passe incorrect");
    }

    public function signOut(){
        Auth::logout();
        return redirect()->route('home');
    }
}
