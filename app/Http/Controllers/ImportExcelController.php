<?php

namespace App\Http\Controllers;

use App\Imports\ImportExcel;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelController extends Controller
{
    public function index()
    {
        $usuarios = User::get();
        return view('import-excel', compact('usuarios'));
    }

    public function import_excel_registers(Request $request) 
    {
          //dd($request->all());
          Excel::import(new ImportExcel, $request->file('excel_file'));
          return redirect()->back();
    }

}
