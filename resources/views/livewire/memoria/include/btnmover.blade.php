<div class="flex justify-end h-24">
    <div class="flex justify-end py-4 my-6 space-x-4"  wire:loading.remove>
        <a class="max-w-md btn" wire:click="onVolver" >
            Volver
        </a>
        <a class="btn btn-wide btn-primary" wire:click="onContinuar">
            Continuar
        </a>
    </div>
    <div wire:loading class=" text-right flex justify-end py-4 my-6 space-x-4 text-xl font-semibold text-blue-600">
        <p>Procesando...</p>
    </div>
</div>
