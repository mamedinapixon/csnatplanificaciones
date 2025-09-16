<!DOCTYPE html>
<html>
<head>
    <title>Informe Diario de Asistencia</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h1 { text-align: center; }
    </style>
</head>
<body>
    <h1>Informe Diario de Asistencia - Fecha: {{ $fecha }}</h1>
    <table>
        <thead>
            <tr>
                <th>Apellido y Nombre</th>
                <th>Hora de Ingreso</th>
                <th>Hora de Salida</th>
                <th>Ubicación</th>
                <th>Controlado</th>
                <th>Resultado del Control</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($asistencias as $asistencia)
                <tr>
                    <td>{{ $asistencia['apellido_nombre'] }}</td>
                    <td>{{ $asistencia['hora_ingreso'] }}</td>
                    <td>{{ $asistencia['hora_salida'] }}</td>
                    <td>{{ $asistencia['ubicacion'] }}</td>
                    <td>{{ $asistencia['controlado'] }}</td>
                    <td>{{ $asistencia['resultado_control'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
