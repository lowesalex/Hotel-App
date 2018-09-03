<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportController extends Controller
{
    //
    public function getImport()
    {
        return view('tools/importcsv');
    }

    
}
