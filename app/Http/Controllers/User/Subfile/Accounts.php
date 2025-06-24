<?php

namespace App\Http\Controllers\User\Subfile;

use App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Accounts extends Controller
{
    public function showAccounts(){
        return view('user.subfolder.accounts.accounts');
    }
}