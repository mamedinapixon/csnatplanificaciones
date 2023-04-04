<?php

namespace App\Http\Livewire\Memoria;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Memoria;
use Illuminate\Support\Facades\Auth;
use Mail;

class CambiarEstado extends Component
{
    public $memoria;
    public $observaciones;

    public function mount($memoria)
    {
        $this->memoria = $memoria;
        $this->observaciones = $memoria->observaciones_revision;

    }

    public function render()
    {
        return view('livewire.memoria.cambiar-estado');
    }

    public function OnQuitarPresentada()
    {
        if(Auth::user()->can('cambiar estado memoria'))
        {
           $memoria = Memoria::find($this->memoria->id);
            $memoria->update([
                "estado_id" => 1,
                "presentado_at" => null,
                "revisado_at" => null,
            ]);
            $this->memoria = $memoria;
            session()->flash('message', 'Memoria habilitada para edición!');
        }

    }

    public function OnAprobado()
    {
        //dd($this->observaciones);
        if(Auth::user()->can('revisar memorias'))
        {
            $memoria = Memoria::find($this->memoria->id);
            //dd($memoria->user->email);
            $memoria->update([
                "estado_id" => 3,
                "revisado_at" => Carbon::now()->timestamp,
                "observaciones_revision" => $this->observaciones
            ]);
            $this->memoria = $memoria;
            session()->flash('message', 'Memoria aprobada!');

            /*Mail::to($memoria->user)
            ->queue(new MailNotificarRevisado($this->memoria));*/
        }

    }

    public function OnDesaprobado()
    {
        //dd($this->observaciones);
        if(Auth::user()->can('revisar memorias'))
        {
            $memoria = memoria::find($this->memoria->id);
            //dd($memoria->user->email);
            $memoria->update([
                "estado_id" => 4,
                "revisado_at" => Carbon::now()->timestamp,
                "observaciones_revision" => $this->observaciones
            ]);
            $this->memoria = $memoria;
            session()->flash('message', 'Memoria revisada!');

            /*Mail::to($memoria->user)
            ->queue(new MailNotificarRevisado($this->memoria));*/
        }

    }

    public function OnPresentar()
    {
        if(Auth::user()->can('cambiar estado memoria'))
        {
            $memoria = Memoria::find($this->memoria->id);
            $memoria->update([
                "estado_id" => 2,
                "presentado_at" => Carbon::now()->timestamp
            ]);
            $this->memoria = $memoria;
            session()->flash('message', 'Memoria presentada!');
        }
    }
}
