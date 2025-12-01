<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wynik quizu</title>
    <style>
        body { background:#111; font-family:Arial; text-align:center; padding-top:70px; color:white; }
        .box {
            background:#000; padding:40px; margin:auto; border-radius:15px;
            width:500px; box-shadow:0 0 15px #000;
        }
        .score { font-size:28px; margin:20px 0; }
        a { color:#81a3ff; }
    </style>
</head>
<body>

<div class="box">
    <h1>Twój wynik</h1>

    <div class="score">
        Zdobyłeś <b>{{ $punkty }}</b> / {{ $ilePytan }} punktów
    </div>

    <a href="{{ route('quiz.index') }}">Powrót do strony głównej</a>
</div>

</body>
</html>
