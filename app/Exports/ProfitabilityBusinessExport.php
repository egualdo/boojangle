<?php

namespace App\Exports;

use App\Project;
use App\Timesheet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromView;

// use Maatwebsite\Excel\Concerns\WithHeadings;
// use Maatwebsite\Excel\Events\AfterSheet;
// use Maatwebsite\Excel\Concerns\ShouldAutoSize;
// use Maatwebsite\Excel\Concerns\WithColumnWidths;

// FromCollection, WithHeadings
class ProfitabilityBusinessExport implements FromView
// ShouldAutoSize
// ,WithColumnWidths

{
     protected $global;

    function __construct($global) {
        $this->global = $global;
    }

    //  public function columnWidths(): array
    // {
    //     // return [
    //     //     'A' => 55,
    //     //     'B' => 45,            
    //     // ];
    // }

     public function view(): View
    {   
        return view('exports.invoices', [
            'invoices' => $this->global
        ]);
    }
}
