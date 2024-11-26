<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Cursos por Materia</title>
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
    <h1>Reporte de Cursos por Materia</h1>
    <table>
        <thead>
            <tr>
                <th>Materia</th>
                <th>Curso</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
                @foreach ($subject->courses as $course)
                    <tr>
                        <td>{{ $subject->name }}</td>
                        <td>{{ $course->name }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</body>
</html>
