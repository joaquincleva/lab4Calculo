<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Comisiones</title>
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
    <h1>Reporte de Comisiones</h1>
    <table>
        <thead>
            <tr>
                <th>Aula</th>
                <th>Horario</th>
                <th>Curso</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item['Aula'] }}</td>
                    <td>{{ $item['Horario'] }}</td>
                    <td>{{ $item['Curso'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
