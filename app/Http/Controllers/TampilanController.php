<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class TampilanController extends Controller
{
    public function showTampilan(){
        return view('layouts.tampilan');
    }
}