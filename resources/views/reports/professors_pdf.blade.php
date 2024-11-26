<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Profesores y Comisiones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Reporte de Profesores</h1>
    <table>
        <thead>
            <tr>
                <th>Profesor</th>
                <th>Especialización</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $professor)
                    <tr>
                        <td>{{ $professor->name }}</td>
                        <td>{{ $professor->specialization }}</td>
                    </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>