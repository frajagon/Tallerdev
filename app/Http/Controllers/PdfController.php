<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use PDF;

class PdfController extends Controller
{
    public function imprimirPersonas(Request $request)
    {
        $personas = Persona::orderBy('id', 'ASC')->get();
        $pdf = PDF::loadView('Pdf.personasPDF', ['personas' => $personas]);
        $pdf->setPaper('carta', 'landscape');
        return $pdf->stream();
    }
}
