<?php

namespace App\Exports;

use App\Models\InterestedUser;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class UsersExport implements FromCollection,WithHeadings,WithStyles,ShouldAutoSize,WithColumnFormatting
{
    
    public function collection()
    {
           $users=InterestedUser::    join('data_research_idiom', 'data_research_idiom.id', '=', 'interested_users.data_research_id')
                                    ->join('idioms', 'idioms.id', '=', 'interested_users.idiom_id')
                                    ->select(   'interested_users.name',
                                                'interested_users.lastname',
                                                'interested_users.email',
                                                'interested_users.country',
                                                'interested_users.phone',
                                                'interested_users.company',
                                                DB::raw('idioms.name as idiom'),
                                                DB::raw('data_research_idiom.title as data_research'),
                                            )
                                    ->get();
                                    
            foreach ($users as $key => $value) {
                if($key=='phone'){
                    $value= (string)$value;
                }
            }
            
            return $users;
         
        
    }

     public function headings(): array
    {
        return [
            'Name',
            'Lastname',
            'Email',
            'Country',
            'Phone',
            'Company',
            'Language',
            'Data Research'
        ];
    }

    public function styles(Worksheet $sheet){
      return [1    => ['font' => ['bold' => true]]];
    }

    public function columnFormats(): array
    {
        //se hace para mistrar todo el string del nro de telefono
        return [
            // F is the column
            'E' => '0'
        ];
    }

    
}
