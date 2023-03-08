<?php

namespace App\Http\Livewire\Planificacion;

use App\Mail\MailNotificarRevisado;
use Livewire\Component;
use Carbon\Carbon;
use App\Models\Planificacion;
use Illuminate\Support\Facades\Auth;
use Mail;

class CambiarEstado extends Component
{
    public $planificacion;

    public function mount($planificacion)
    {
        $this->planificacion = $planificacion;
    }

    public function render()
    {
        return view('livewire.planificacion.cambiar-estado');
    }

    public function OnQuitarPresentada()
    {
        if(Auth::user()->can('cambiar estado planificaciones'))
        {
           $planificacion = Planificacion::find($this->planificacion->id);
            $planificacion->update([
                "estado_id" => 1,
                "presentado_at" => null,
                "revisado_at" => null,
            ]);
            $this->planificacion = $planificacion;
            session()->flash('message', 'Planificación habilitada para edición!');
        }

    }

    public function OnAprobado()
    {
        if(Auth::user()->can('revisar planificaciones'))
        {
            $planificacion = Planificacion::find($this->planificacion->id);
            //dd($planificacion->user->email);
            $planificacion->update([
                "estado_id" => 3,
                "revisado_at" => Carbon::now()->timestamp
            ]);
            $this->planificacion = $planificacion;
            session()->flash('message', 'Planificación revisada!');

            Mail::to($planificacion->user)
            ->queue(new MailNotificarRevisado($this->planificacion));
        }

    }

    public function OnDesaprobado()
    {
        if(Auth::user()->can('revisar planificaciones'))
        {
            $planificacion = Planificacion::find($this->planificacion->id);
            //dd($planificacion->user->email);
            $planificacion->update([
                "estado_id" => 4,
                "revisado_at" => Carbon::now()->timestamp
            ]);
            $this->planificacion = $planificacion;
            session()->flash('message', 'Planificación revisada!');

            Mail::to($planificacion->user)
            ->queue(new MailNotificarRevisado($this->planificacion));
        }

    }

    public function OnPresentar()
    {
        if(Auth::user()->can('cambiar estado planificaciones'))
        {
            $planificacion = Planificacion::find($this->planificacion->id);
            $planificacion->update([
                "estado_id" => 2,
                "presentado_at" => Carbon::now()->timestamp
            ]);
            $this->planificacion = $planificacion;
            session()->flash('message', 'Planificación presentada!');
        }
    }
}
