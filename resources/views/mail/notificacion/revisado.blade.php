<p>Fue revisada la siguiente planificación:<p>
    <ul>
        <li><b>Periodo Lectivo:</b> {{$periodo_lectivo}}</li>
        <li><b>Carrera:</b> {{$carrera}}</li>
        <li><b>Asignatura:</b> {{$asigantura}}</li>
        <li><b>Estado: </b>{{$estado}}</li>
    </ul>
    <br>
    <a href="{{ config('app.url')}}/planificacion/{{$planificacion->id}}" style="
        background-color: #570df8;
        color: white;
        padding: 15px 30px;
        border-radius: 10px;
    ">Ir a planificación</a>
