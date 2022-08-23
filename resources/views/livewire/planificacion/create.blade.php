<div>
    <div class="form-contro">
        <div class="w-full max-w-xs form-control">
            <label class="label">
              <span class="label-text">Seleccione la carrera</span>
            </label>
            <select class="select select-bordered">
                @foreach ($carreras as $carrera)
                    <option>{{ $carrera->nombre }} - {{ $carrera->plan_anio }}</option>
                @endforeach
            </select>
          </div>
    </div>
</div>
