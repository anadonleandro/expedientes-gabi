<?php

namespace sisExpedientes\Http\Controllers;

use Illuminate\Http\Request;
use sisExpedientes\Http\Requests;
use sisExpedientes\Expediente;
use sisExpedientes\Persona;
use sisExpedientes\Exports\ExpteExport;
use Illuminate\Support\Facades\Redirect;
use Session;
use Carbon\Carbon;
use DB;
use Fpdf;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function excel()
    {
        return Excel::download(new ExpteExport, 'expedientes.xlsx');
	}
}
