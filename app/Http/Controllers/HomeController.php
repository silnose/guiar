<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{

    public function index()
    {
        return view('welcome');
    }

    public function login(){

        if (Auth::check()) {
            return redirect()->route('companies.index');
        }
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $user = $request->all();

        if (Auth::attempt(['email' => $user['email'], 'password' => $user['password']])) {
            // Authentication passed...
            return redirect()->route('categories.index');
        }else{

            return redirect()->route('login')->withErrors('Credenciales invalidas.');
        }
    }

    public function logout(){

        Auth::logout();
        return redirect()->route('home');
    }

    public function dash(){
        
        $companies = Company::all();
        
    }
}