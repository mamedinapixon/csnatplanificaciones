<p>El docente {{$user->name}} presento la siguiente planificación:<p>
<ul>
    <li><b>Periodo Lectivo:</b> {{$periodo_lectivo}}</li>
    <li><b>Carrera:</b> {{$carrera}}</li>
    <li><b>Asignatura:</b> {{$asigantura}}</li>
    <li><b>Fecha Presentado:</b> {{ $fechapresentado }}</li>
</ul>
<br>
<div style="margin-bottom: 20px;">
    <a href="{{ config('app.url')}}/planificacion/{{$planificacion->id}}" style="
        background-color: #570df8;
        color: white;
        padding: 15px 30px;
        border-radius: 10px;
        text-decoration: none;
        margin-right: 10px;
    ">Ir a planificación</a>
    <br>
    <a href="{{ config('app.url')}}/planificacion/{{$planificacion->id}}/pdf" style="
        background-color: #26dc4e;
        color: white;
        padding: 15px 30px;
        border-radius: 10px;
        text-decoration: none;
    ">Ver PDF del formulario de planificación</a>
    <br>
    <a href="{{ config('app.url')}}/programas/{{$planificacion->urlprograma}}" style="
        background-color: #dc2626;
        color: white;
        padding: 15px 30px;
        border-radius: 10px;
        text-decoration: none;
    ">Ver programa</a>
</div>
