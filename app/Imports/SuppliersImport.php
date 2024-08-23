<?php

namespace App\Imports;

use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Flasher\Prime\FlasherInterface;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\RemembersRowNumber;
use Maatwebsite\Excel\Concerns\Importable;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SuppliersImport implements ToCollection,
                                WithHeadingRow,
                                // SkipsEmptyRows,
                                WithBatchInserts,
                                WithChunkReading,
                                WithCalculatedFormulas
{

    public function  __construct($counter=1,$counter2=1)
    {
        $this->counter= $counter;
        $this->counter2= $counter2;
    }
   
    // public function model(array $row)
    // {
       
    // }
      public function validateFile($rowsN){
        $countrow=2;
        $log='';
       
        foreach ($rowsN as $row) {//0 it 2 row
            //  dd($row);
                if($row['name'] === null  || $row['name'] === ''){
                    $log= $log.$countrow.".(name not found)/";
                   
                    
                }else{

                                         if($row['name'] !== ''  && $row['name'] !== null){
                                            $name= Supplier::whereRaw('LOWER(`name`) LIKE ? ',['%'.trim(strtolower($row['name'])).'%'])->first();
                                            //si ya hay un registro con ese name entonces se modifica o se omite?
                                                                    
                                            if($name != null && count($name)>0){ //1
                                                    $log= $log.$countrow.".(name already been taken)/"; 
                                                  
                                            }else{
                                                $row["name"];
                                            }
                                                               
                                         }else{
                                            $log= $log.$countrow.".(name is empty)/";
                                         }
                                       
                                        // esto para que no se registren teniendo inconsistencias en los datos requeridos
                                                
                                            if( isset($row['address'])==false){

                                                $row['address']= '' ;
                                            } 

                                        $rowsN[$countrow-2]=$row;
                                        
                } 
                $countrow++;   
        }
        $log=explode("/",$log);
        // $countlog=strlen($log);
        array_pop($log);
        Session::flash('log', $log);
        return $rowsN;

    }

    public function collection(Collection $rows)
    {
            $rowsNew=$this->validateFile($rows);

            $count=2;
            $string_session_rows=session('log');
            
                    foreach ($rowsNew as $row) {

               
                        $arrexp=[];
                        foreach ($string_session_rows as  $value) {
                            $exp=explode('.',$value);
                            array_push($arrexp,$exp[0]);
                        }
                       
                        $search=in_array((string)$count, $arrexp );
                        
                        
                        if($search === false ){
                                                    Supplier::create([
                                                    'name'=> $row['name'],
                                                     'address'=> $row['address'],
                                                ]);
                                    $count ++;
                        }else{
                            $count ++;
                        }    
                    }
            
    }
   

    public function batchSize(): int
    {
        return 1000;
    }
    
    public function chunkSize(): int
    {
        return 1000;
    }
}
