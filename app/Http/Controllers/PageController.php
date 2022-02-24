<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Import;
use Facade\FlareClient\Http\Response;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\DataTables as DataTablesDataTables;
use Yajra\DataTables\Utilities\Request as UtilitiesRequest;

class PageController extends Controller {

    
   public function importCsv(){

   
    @import::truncate();
      @$report = @fopen(base_path("data/customers.csv"), "r");

      @$dataRow = true;
      while ((@$data = @fgetcsv(@$report, 4000, ",")) !== FALSE) {
          if (!$dataRow) {
            Import::create([
                  "last_name" => $data['2'],
                  "email" => $data['3'],
                  "gender" => $data['4']
              ]);    
          }
          $dataRow = false;
      }
      fclose($report);
    }
    
    
   public function index(Request $request)
   {
      // $this->importCsv();
    if ($request->ajax()) {
        $data = Import::latest()->get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    return view('user');

   }
    public function grafico() {
        
        /*****iNVALIDOS*/
        $email= DB::table('Imports')->select('email as total')->where('email', 'NOT REGEXP','^[a-zA-Z0-9][a-zA-Z0-9._-]*[a-zA-Z0-9._-]@[a-zA-Z0-9][a-zA-Z0-9._-]*[a-zA-Z0-9]\\.[a-zA-Z]{2,63}$' )->get();
        $rowsEmail = count($email);

        $gender = DB::table('Imports')
        ->where('gender', '=', '')
        ->orWhereNull('gender')
        ->get();
        $rowsGender  = count($gender);

        $last_name = DB::table('Imports')
        ->where('last_name', '=', '')
        ->orWhereNull('last_name')
        ->get();
        $rowsLastName  = count($last_name);
        /************ */

        /*****vALIDOS */

        $email= DB::table('Imports')->select('email as total')->where('email', 'REGEXP','^[a-zA-Z0-9][a-zA-Z0-9._-]*[a-zA-Z0-9._-]@[a-zA-Z0-9][a-zA-Z0-9._-]*[a-zA-Z0-9]\\.[a-zA-Z]{2,63}$' )->get();
        $rowsValEmail = count($email);
        //print_r($rowsValEmail);

        $gender = DB::table('Imports')
        ->where('gender', '<>', '')
        ->get();
        $rowsValGender  = count($gender );

        $last_name = DB::table('Imports')
        ->where('last_name', '<>', '')
        ->get();
        $rowsValSobreNome = count($last_name );
    
        return response()->json([
            'totalInvEmail' =>  $rowsEmail,
            'totalInvGender' =>  $rowsGender,
             'totalInvSobreNome' =>  $rowsLastName,
             'totalValEmail' =>   $rowsValEmail,
             'totalValGender' => $rowsValGender,
             'totalValSobreNome' =>$rowsValSobreNome
             
        ]);
    }

    
  


  
}