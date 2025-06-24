<?php

namespace App\Http\Controllers\User\Subfile;

use App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewAccount extends Controller
{
    public function showNewAccount(){
        return view('user.subfolder.accounts.newaccount');
    }
}
