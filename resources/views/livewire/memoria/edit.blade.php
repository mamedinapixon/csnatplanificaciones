<div class="space-y-4 ">

    @include('livewire.memoria.include.steps')

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
    @include('livewire.memoria.include.steps')
    @push('scripts')

    @endpush
</div>
