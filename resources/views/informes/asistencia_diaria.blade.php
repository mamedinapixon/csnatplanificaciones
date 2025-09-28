<!DOCTYPE html>
<html>
<head>
    <title>Informe Diario de Asistencia</title>
    <style>
        body { font-family: sans-serif; font-size: 10px; } /* Reducir tamaño de fuente general */
        table { width: 100%; border-collapse: collapse; margin-top: 20px; font-size: 9px; } /* Reducir tamaño de fuente de la tabla */
        th, td { border: 1px solid #ddd; padding: 3px; text-align: left; } /* Reducir padding de las celdas */
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
                <th>Ingreso</th>
                <th>Salida</th>
                <th>Ubicación</th>
                <th>Controlado</th>
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
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
