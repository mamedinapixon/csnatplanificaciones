<p>El docente {{$user->name}} presento la siguiente planificación:<p>
    <ul>
        <li><b>Periodo Lectivo:</b> {{$periodo_lectivo}}</li>
        <li><b>Carrera:</b> {{$carrera}}</li>
        <li><b>Asignatura:</b> {{$asigantura}}</li>
        <li><b>Fecha Presentado:</b> {{ $fechapresentado }}</li>
    </ul>
    <br>
    <p>Se adjunta a este correo el PDF de la planificación presentada.</p>
    <br>
    <a href="{{ config('app.url')}}/planificacion/{{$planificacion->id}}" style="
        background-color: #570df8;
        color: white;
        padding: 15px 30px;
        border-radius: 10px;
    ">Ir a planificación</a>
