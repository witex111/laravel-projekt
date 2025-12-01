<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Pytanie — {{ $quiz->tytul }}</title>

    <style>
        body {
            background: #000000d8;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 40px;
            color: white;
        }

        .box {
            background: #000000ff;
            width: 600px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0,0,0,0.6);
        }

        h2 {
            color: #ffffffc7;
        }

        .answer {
            display: block;
            background: #202020;
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #444;
            cursor: pointer;
            transition: 0.2s ease;
            color: #dfdfdf;
        }

        .answer:hover {
            background: #333;
            border-color: #7f53ff;
        }

        button {
            padding: 10px 25px;
            margin-top: 20px;
            background: linear-gradient(135deg, #35246c 0%, #5636e0 100%);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: linear-gradient(135deg, #1a2a6c 0%, #2a45b8 100%);
        }
    </style>
</head>
<body>

<div class="box">

    <h2>{{ $pytanie->tresc }}</h2>

    <form action="{{ route('quiz.submit', ['quiz' => $quiz->id, 'nr' => $nr]) }}" method="POST">

        @csrf

        @foreach($pytanie->odpowiedzi as $o)
            <label class="answer">
                <input type="radio" name="odpowiedz_id" value="{{ $o->id }}" required>
                {{ $o->odpowiedz }}
            </label>
        @endforeach

        <button type="submit">Zatwierdź</button>

    </form>

</div>

</body>
</html>
