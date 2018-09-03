<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportController extends Controller
{
    //
    public function getImport()
    {
     //   return view('tools/importcsv');
    }

    
    public function parseImport(CsvImportRequest $request)
{
    $path = $request->file('csv_file')->getRealPath();
    $data = array_map('str_getcsv', file($path));
    $csv_data = array_slice($data, 0, 2);
    return view('import_fields', compact('csv_data'));
}

}
