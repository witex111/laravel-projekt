<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Pytanie {{ $pytanieId }}</title>

    <style>
        body {
            background: #1c1c1c;
            color: #ddd;
            font-family: Arial;
        }
        .panel {
            max-width: 600px;
            margin: 60px auto;
            background: #111;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 0 25px rgba(0,0,0,.7);
        }
    </style>
</head>

<body>

<div class="panel">
    <h1>Pytanie {{ $pytanieId }}</h1>

    {!! $tresc !!}

    <br><br>
    <a href="/sesja/{{ $sesjaId }}" style="color:#81a0ff;">← Powrót</a>
</div>

</body>
</html>
