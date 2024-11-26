<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Estudiantes Inscritos</title>
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
    <h1>Reporte de Estudiantes Inscritos</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre del Estudiante</th>
                <th>Email</th>
                <th>Cursos</th>
                <th>Comisiones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>
                        @foreach ($student->courses as $course)
                            {{ $course->name }}<br>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($student->courses as $course)
                            @foreach ($course->commissions as $commission)
                                {{ $commission->name }}<br>
                            @endforeach
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
