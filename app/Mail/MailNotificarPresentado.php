<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Planificacion;
use Illuminate\Support\Facades\Auth;

class MailNotificarPresentado extends Mailable
{
    use Queueable, SerializesModels;
    public  $planificacion,
            $asigantura,
            $carrera,
            $periodo_lectivo,
            $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Planificacion $planificacion)
    {
        //
        $this->planificacion = $planificacion;
        $this->asigantura = $planificacion->materiaPlanEstudio->anio_curdada."º año - ".$planificacion->materiaPlanEstudio->materia->nombre;
        $this->carrera = $planificacion->materiaPlanEstudio->carrera->codigo_siu;
        $this->periodo_lectivo = $planificacion->periodoLectivo->periodoAcademico->nombre." ".$planificacion->periodoLectivo->anio_academico;
        $this->user = Auth::user();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Planificación Presentada")->view('mail.notificacion.presentado');
    }
}
