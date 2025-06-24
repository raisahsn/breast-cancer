<?php

namespace App\Http\Controllers\User\Subfile;

use App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Documents extends Controller
{
    public function showDocuments(){
        return view('user.subfolder.document-folder.documents');
    }
}
