<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Estudiante;
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

    public function imprimirEstudiantes(Request $request)
    {
        $estudiantes = Estudiante::orderBy('id', 'ASC')->get();
        $pdf = PDF::loadView('Pdf.estudiantesPDF', ['estudiantes' => $estudiantes]);
        $pdf->setPaper('carta', 'landscape');
        return $pdf->stream();
    }
}
