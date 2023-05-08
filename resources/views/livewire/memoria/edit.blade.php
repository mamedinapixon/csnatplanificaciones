<div class="space-y-4 ">

    @include('livewire.memoria.include.steps')

    @if(Session::has('error'))
        <div class="alert alert-error shadow-lg mb-8">
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
              <span>{{ Session::get('error') }}</span>
              <a class="link link-primar" href="{{url('memoria/'.$memoria_id.'/edit?step=1')}}"> Ir a 1º paso</a>
            </div>
          </div>
    @endif

    <x-pixonui.show.labeltext caption="Apellido y Nombre">{{ $memoria->user->name }}</x-pixonui.show.labeltext>
    <x-pixonui.show.labeltext caption="E-mail">{{ $memoria->user->email }}</x-pixonui.show.labeltext>
    <x-pixonui.show.labeltext caption="Año academico">{{ $memoria->anio_academico }}</x-pixonui.show.labeltext>
    <div class="divider"></div>
    @includeWhen($step == 1, 'livewire.memoria.include.step1')
    @includeWhen($step == 2, 'livewire.memoria.include.step2')
    @includeWhen($step == 3, 'livewire.memoria.include.step3')
    @includeWhen($step == 4, 'livewire.memoria.include.step4')
    @includeWhen($step == 5, 'livewire.memoria.include.step5')
    @includeWhen($step == 6, 'livewire.memoria.include.step6')

    @if(Session::has('error'))
        <div class="alert alert-error shadow-lg mb-8">
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
              <span>{{ Session::get('error') }} </span>
              <a class="link link-primar" href="{{url('memoria/'.$memoria_id.'/edit?step=1')}}"> Ir a 1º paso</a>
            </div>
          </div>
    @endif

    @include('livewire.memoria.include.steps')
    @push('scripts')

    @endpush
</div>
