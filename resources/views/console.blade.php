<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Główna konsola</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #000000d8;
            text-align: center;
            padding: 40px;
        }

        .box {
            background: #000000ff;
            width: 420px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.5);
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #125516ff;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            background: linear-gradient(135deg, hsla(253, 94%, 14%, 0.57) 0%, hsla(252, 88%, 48%, 0.55) 100%);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        button:hover {
            background: linear-gradient(135deg, hsla(205, 82%, 22%, 0.52) 0%, hsla(231, 88%, 48%, 0.45) 100%);
        }

        .quiz-list {
            margin-top: 25px;
        }

        .quiz-link {
            display: block;
            margin: 7px 0;
            color: #5d7496ff;
            text-decoration: none;
        }

        h1, h2 {
            color: #ffffffaf;
        }

        input::placeholder {
            color: #997863ff;
        }

        .footer-links {
            margin-top: 15px;
            font-size: 13px;
        }

        .footer-links a {
            margin: 0 4px;
            color: #5d7496ff;
        }
    </style>
</head>
<body>

<div class="box">

    <h1>✔</h1>
    <h2>Uczniowie! To jest główna konsola</h2>

    <form action="#" method="POST">
        <label>Wprowadź kod</label>
        <input type="text" name="code" placeholder="Session code">
        <button type="submit">Login</button>
    </form>

    <div class="footer-links">
        <a href="#">Wiktor.Stolarski@poznan.merito.pl</a> |
        <a href="#">panStolarski.pl</a> |
        <a href="#">Stowarzyszenie Marvel/DC</a>
    </div>

    <h3>Dostępne Quizy</h3>

    <div class="quiz-list">
        @foreach($quizy as $quiz)
          <a href="{{ route('quiz.pytanie', ['quiz' => $quiz->id, 'nr' => 1]) }}" class="quiz-link">

                {{ $quiz->tytul }}
            </a>
        @endforeach
    </div>

</div>

</body>
</html>
