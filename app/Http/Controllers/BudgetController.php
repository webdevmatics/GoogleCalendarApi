<?php

namespace App\Http\Controllers;

use App\Budget;
use Illuminate\Http\Request;

use App\Http\Requests;

class BudgetController extends Controller
{
    public function showForm()
    {
        return view('upload');
    }

    public function store(Request $request)
    {   
        //get file
        $upload=$request->file('upload-file');
        $filePath=$upload->getRealPath();
        //open and read
        $file=fopen($filePath, 'r');

        $header= fgetcsv($file);

        // dd($header);
        $escapedHeader=[];
        //validate
        foreach ($header as $key => $value) {
            $lheader=strtolower($value);
            $escapedItem=preg_replace('/[^a-z]/', '', $lheader);
            array_push($escapedHeader, $escapedItem);
        }

        //looping through othe columns
        while($columns=fgetcsv($file))
        {
            if($columns[0]=="")
            {
                continue;
            }
            //trim data
            foreach ($columns as $key => &$value) {
                $value=preg_replace('/\D/','',$value);
            }

           $data= array_combine($escapedHeader, $columns);

           // setting type
           foreach ($data as $key => &$value) {
            $value=($key=="zip" || $key=="month")?(integer)$value: (float)$value;
           }

           // Table update
           $zip=$data['zip'];
           $month=$data['month'];
           $lodging=$data['lodging'];
           $meal=$data['meal'];
           $housing=$data['housing'];

           $budget= Budget::firstOrNew(['zip'=>$zip,'month'=>$month]);
           $budget->lodging=$lodging;
           $budget->meal=$meal;
           $budget->housing=$housing;
           $budget->save();
        }
        
        
    }
}