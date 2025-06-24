<?php

namespace App\Http\Controllers\User\Subfile;

use App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Download extends Controller
{
    public function showDownload(){
        return view('user.subfolder.document-folder.download');
    }
}