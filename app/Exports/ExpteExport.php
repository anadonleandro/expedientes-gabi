<?php

namespace sisExpedientes\Exports;

use sisExpedientes\Expediente;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExpteExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Expediente::all();
    }
}
