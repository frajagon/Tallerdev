<?php

namespace App\Http\Controllers;

use App\Models\Acudiente;
use Illuminate\Http\Request;
use App\Models\Acudientes;
use App\Models\Estudiante;
use App\Models\Persona;
use App\Models\Docente;
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

    public function imprimirAcudientes(Request $request)
    {
        $acudientes = Acudiente::orderBy('id', 'ASC')->get();
        $pdf = PDF::loadView('Pdf.acudientesPDF', ['acudientes' => $acudientes]);
        $pdf->setPaper('carta', 'landscape');
        return $pdf->stream();
    }

    public function imprimirDocentes(Request $request)
    {
        $acudientes = Docente::orderBy('id', 'ASC')->get();
        $pdf = PDF::loadView('Pdf.docentesPDF', ['docentes' => $acudientes]);
        $pdf->setPaper('carta', 'landscape');
        return $pdf->stream();
    }
}
