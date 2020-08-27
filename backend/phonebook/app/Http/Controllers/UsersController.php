<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UsersController extends Controller
{
    public function signup(Request $request) 
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $user = new User();
        $user->name = request()->name;
        $user->email = request()->email;
        $user->password = bcrypt(request()->password);
        $user->save();

        return response()->json('User Added', 201);
    }

    public function signin(Request $request)
    {

        /*
        * Nema Velike mudrosti, prvo validacija email-a i passworda
        * $credentials je to isto, samo asocijativni niz iliti JS objekat od email i pass sa vrednostima
        */

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        

        /* 
        * 
        * JWTAuth::attempt, gore importovana fasada, attempt je metoda iz paketa koja kreira token
        * Ako ne uspe emituje gresku
        *
        * Proverava da li je dobra kombinacija email/pass, odnosno da li postoji koristink u bazi
        * Ako nisu dobri email i/ili pass, vraca false i emituje odgovor : 'Wrong Username and/or Password'
        *
        * catch - ako je neka druga greska u pitanju, u exceptions handler-u se definise
        */

        try {
            if(!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Wrong Username and/or Password'], 401);
            }
        } catch (JWTExceptions $e) {
            return response()->json(['error' => 'Cannot create token...'], 500);
        }

        // Nalazi usera koji salje sa responsom
        $user = User::where('email', request()->email)->first();
        
        return response()->json(['token' => $token, 'user' => $user], 200);

    }



}
