<!DOCTYPE html>
<html>
<head>
    <title>Informe Diario de Asistencia</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 12px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .footer {
            text-align: center;
            font-size: 10px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <h1>Informe Diario de Asistencia</h1>
    <p><strong>Fecha del Informe:</strong> {{ $fecha }}</p>

    <table>
        <thead>
            <tr>
                <th>Apellido y Nombre</th>
                <th>Hora de Ingreso</th>
                <th>Hora de Salida</th>
                <th>Ubicación</th>
                <th>Control Realizado</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($asistencias as $asistencia)
                <tr>
                    <td>{{ $asistencia['apellido_nombre'] }}</td>
                    <td>{{ $asistencia['hora_ingreso'] }}</td>
                    <td>{{ $asistencia['hora_salida'] }}</td>
                    <td>{{ $asistencia['ubicacion'] }}</td>
                    <td>{{ $asistencia['control'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No hay registros de asistencia para esta fecha.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Generado el {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}
    </div>
</body>
</html>
