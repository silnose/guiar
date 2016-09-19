<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

use App\Http\Requests;

class DashController extends Controller
{
    public function index(){

        $companies = Company::all();
    }
}
