<!DOCTYPE html>
<html>
<head>
    <title>Projects</title>
    <style>
        table { border-collapse: collapse; width: 80%; margin:auto; }
        th, td { border:1px solid #ccc; padding:8px; text-align:left; }
        th { background:#eee; }
    </style>
</head>
<body>

<h2 align="center">Data Projects</h2>

@if($projects->count() == 0)
    <p align="center">Data kosong</p>
@else
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Description</th>
            <th>Tech</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projects as $i => $project)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $project->title }}</td>
            <td>{{ $project->description }}</td>
            <td>{{ $project->tech }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

</body>
</html>