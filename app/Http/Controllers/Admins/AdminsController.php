<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminsController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function main(){
        return view('admins.main');
    }
}
