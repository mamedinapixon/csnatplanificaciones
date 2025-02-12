<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Planificacion;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MailNotificarPresentado extends Mailable
{
    use Queueable, SerializesModels;

    public  $planificacion,
            $asigantura,
            $carrera,
            $periodo_lectivo,
            $user,
            $fechapresentado;

    protected $pdfPath;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Planificacion $planificacion, $pdfPath = null)
    {
        $this->planificacion = $planificacion;
        $this->asigantura = $planificacion->materiaPlanEstudio->anio_curdada."º año - ".$planificacion->materiaPlanEstudio->materia->nombre;
        $this->carrera = $planificacion->materiaPlanEstudio->carrera->codigo_siu;
        $this->periodo_lectivo = $planificacion->periodoLectivo->periodoAcademico->nombre." ".$planificacion->periodoLectivo->anio_academico;
        $date = Carbon::now()->locale('es');
        $this->fechapresentado = $date->toFormattedDateString();
        $this->user = Auth::user();
        $this->pdfPath = $pdfPath;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->subject("Planificación Presentada")
                     ->view('mail.notificacion.presentado');

        if ($this->pdfPath && file_exists($this->pdfPath)) {
            $mail->attach($this->pdfPath, [
                'as' => "planificacion_{$this->planificacion->id}.pdf",
                'mime' => 'application/pdf',
            ]);
        }

        return $mail;
    }
}
