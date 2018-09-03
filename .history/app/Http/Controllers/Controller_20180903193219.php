<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
class CsvImportRequest extends FormRequest
{
    public function authorize()
    {
   //     return true;
    }

    public function rules()
    {
        return [  'csv_file' => 'required|file'];
    }
}
