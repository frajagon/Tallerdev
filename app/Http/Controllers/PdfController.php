<?php

namespace App\Http\Controllers;

use App\Models\Acudiente;
use Illuminate\Http\Request;
use App\Models\Acudientes;
use App\Models\Estudiante;
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

    public function imprimirEstudiantes(Request $request)
    {
        $estudiantes = Estudiante::orderBy('id', 'ASC')->get();
        $pdf = PDF::loadView('Pdf.estudiantesPDF', ['estudiantes' => $estudiantes]);
        $pdf->setPaper('carta', 'landscape');
        return $pdf->stream();
    }

    public function imprimirAcudi(Request $request)
    {
        $acudientes = Acudiente::orderBy('id', 'ASC')->get();
        $pdf = PDF::loadView('Pdf.acudientesPDF', ['acudientes' => $acudientes]);
        $pdf->setPaper('carta', 'landscape');
        return $pdf->stream();
    }
}
