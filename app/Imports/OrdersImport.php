<?php

namespace App\Imports;

use App\Models\Order;
use App\Models\Supplier;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Flasher\Prime\FlasherInterface;
// use Maatwebsite\Excel\Concerns\ToModel;
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

class OrdersImport implements ToCollection,
                                WithHeadingRow,
                                // SkipsEmptyRows,
                                WithBatchInserts,
                                WithChunkReading,
                                WithCalculatedFormulas
{
   
    // public function model(array $row)
    // {
    //     return new Order([
    //         ''     => $row[0],
    //         ''    => $row[1], 
    //         '' => Hash::make($row[2]),
    //     ]);
    // }
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
             
                if($row['id'] === null  || $row['id'] === ''){
                    $log= $log.$countrow.".(Supplier not found)/";
                   
                    
                }else{

                                         if($row['id'] != null && $row['id'] != ''){

                                                if(Supplier::find($row['id'])!=null){
                                                        $row['id']=Supplier::find($row['id'])->id;//objeto encontrado
                                                }else{
                                                    $log= $log.$countrow.".(Supplier don't exist)/";
                                                }
                                                               
                                         }else{
                                            $log= $log.$countrow.".(Supplier is empty)/";
                                         }

                                         if( isset($row['name'])==false){

                                                $row['name']= '' ;
                                            }
                                       
                                        // esto para    que no se registren teniendo inconsistencias en los datos requeridos
                                            if( isset($row['lote'])==false){

                                                $row['lote']= 0 ;
                                            } 
                                            
                                             if( isset($row['weeks'])==false){

                                                $row['weeks']= 0 ;
                                            } 

                                             if( isset($row['average'])==false){

                                                $row['average']= 0 ;
                                            } 

                                             if( isset($row['week'])==false){

                                                $row['week']= 0 ;
                                            } 

                                             if( isset($row['quantity'])==false){

                                                $row['quantity']= 0 ;
                                            } 
                                             if( isset($row['growth'])==false){

                                                $row['growth']= 0 ;
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

            $count=1;
            $string_session_rows=session('log');
            
                    foreach ($rowsNew as $row) {
                        
                   
               
                        $arrexp=[];
                        foreach ($string_session_rows as  $value) {
                            $exp=explode('.',$value);
                            array_push($arrexp,$exp[0]);
                        }
                       
                        $search=in_array((string)$count, $arrexp );
                        
                     
                    

                            if($row['id'] != '' && $row['id'] != null){
                                  $find=Order::where('supplier_id',$row['id'])->first();
                                 if($find){
                                        foreach ($find as $value) {
                                            $anterior=json_decode($find->weeks_element);
                                            $aux=[];
                                            for ($i=0; $i <count($anterior) ; $i++) { 
                                                array_push($aux,$anterior[$i]->name);
                                            }
                                            
                                            if(in_array("week".$row["week"], $aux )){
                                                foreach ($anterior as  $val) {
                                                    if($val->name == "week".$row['week']){
                                                        $val->quantity=$row['quantity'];
                                                        $val->average=$row['growth'];

                                                        //     [
                                                        //         {"name":"week1","quantity":10,"average":233.33333333333334},
                                                        //         {"name":"week2","quantity":2,"average":-33.333333333333336},
                                                        //    ]
                                                    }
                                                }
                                            }else{
                                                        $obj=(object)[];
                                                        $obj->name="week".$row['week'];
                                                        $obj->quantity=$row['quantity'];
                                                        $obj->average=$row['growth'];
                                                        array_push($anterior,$obj);
                                            }

                                            $avgtotal=0;
                                            $avgquantity=0;
                                            $counter_weeks=0;

                                            foreach ($anterior as  $value) {
                                                $avgtotal=$avgtotal+$value->average;
                                                $avgquantity=$avgquantity+$value->quantity;
                                                $counter_weeks++;
                                            }
                                                    
                                            $find->weeks_element=json_encode($anterior);
                                            $find->weeks=$row['weeks'];
                                            $find->quantity=$row['lote'];
                                            $find->average=$row['average'];
                                            $find->avgtotal=(float) ($avgtotal/$row['average']);
                                            $find->avgquantity=(float) $avgquantity/$counter_weeks;
                                            $find->update();

                                        }
                                  }else{
                                    $sup=Supplier::find($row['id']);
                                    if(!$sup){
                                       $sup= Supplier::create(["name"=>$row['name'],"address"=>""]);
                                    }else{
                                     
                                    }
                                    
                                    $fullweek=null;
                                    $weeks_element=(object)[];
                                    $weeks_element->name="week".$row["week"];
                                    $weeks_element->quantity=(float)$row["quantity"];
                                    $weeks_element->average=(float)$row["growth"];
                                    $fullweek[]=$weeks_element;
                                    $weeks_element_parsed=json_encode($fullweek);
                            
                                    Order::create([
                                                    
                                                     'supplier_id'=> $sup->id,
                                                     'quantity'=> (float) $row['lote'],
                                                     'weeks'=>(float) $row['weeks'],
                                                     'average'=> (float) $row['average'],
                                                     'date'=> Carbon::now()->format('Y-m-d'),
                                                     'weeks_element'=> $weeks_element_parsed
                                                ]);
                                  }
                                              
                            }         
                                                                
                                    $count ++;
                     
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
