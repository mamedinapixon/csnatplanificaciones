<p>El docente {{ $user->name }} presento la siguiente planificación:
<p>
<ul>
    <li><b>Periodo Lectivo:</b> {{ $periodo_lectivo }}</li>
    <li><b>Carrera:</b> {{ $carrera }}</li>
    <li><b>Asignatura:</b> {{ $asigantura }}{{ $electiva_nombre }}</li>
    <li><b>Fecha Presentado:</b> {{ $fechapresentado }}</li>
</ul>
<br>
<div style="margin-bottom: 20px;">
    <table cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td>
                <a href="{{ config('app.url') }}/planificacion/{{ $planificacion->id }}"
                    style="
                    background-color: #570df8;
            color: white;
            padding: 15px 30px;
            border-radius: 10px;
            text-decoration: none;
                    display: inline-block;
                    margin-right: 10px;
                ">Ir
                    a planificación</a>
            </td>
            <td>
                <a href="{{ config('app.url') }}/{{ $planificacion->urlprograma }}"
                    style="
                    background-color: #dc2626;
                    color: white;
                    padding: 15px 30px;
                    border-radius: 10px;
                    text-decoration: none;
                    display: inline-block;
                ">Ver
                    programa</a>
            </td>
        </tr>
    </table>
</div>
