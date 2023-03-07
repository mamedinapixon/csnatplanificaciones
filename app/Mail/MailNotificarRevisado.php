<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Planificacion;
use Illuminate\Support\Facades\Auth;


class MailNotificarRevisado extends Mailable
{
    use Queueable, SerializesModels;
    public  $planificacion,
            $asigantura,
            $carrera,
            $periodo_lectivo,
            $estado;

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
        $this->estado = $planificacion->estado->nombre;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('mail.notificacion.revisado');
        return $this->subject("Planificación Revisada y".$this->estado)->view('mail.notificacion.revisado');
    }
}
