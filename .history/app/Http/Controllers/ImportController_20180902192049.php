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

    public function parseImport(CsvImportRequest $request)
    {
    $path = $request->file('csv_file')->getRealPath();
    // To be continued...
}
}
