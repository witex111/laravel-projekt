<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>{{ $sesja['name'] ?? 'Sesja' }}</title>

    <style>
        body {
            background: #1c1c1c !important;
            color: #ddd;
            font-family: Arial, sans-serif;
        }

        .panel-dark {
            position: relative;
            min-height: 300px;
            min-width: 80%;
            margin-top: 50px;
            background-color: #111;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 25px rgba(0, 0, 0, .8);
            color: #eee;
        }

        hr {
            border-color: #333;
        }

        #question_text {
            background: #0d0d0d;
            padding: 20px;
            border-radius: 8px;
            box-shadow: inset 0 0 15px rgba(0,0,0,0.5);
            margin-top: 20px;
        }

        ol li {
            margin: 8px 0;
        }

        code {
            color: #81a0ff;
        }

        .btn-purple {
            background: #4c21c9 !important;
            color: white !important;
        }

        .btn-purple:hover {
            background: #6a39ff !important;
        }

        .title-icon {
            color: #81a0ff !important;
        }

        a {
            color: #81a0ff;
        }
    </style>
</head>

<body class="dimmable">

    {{-- Kontener główny --}}
    <div class="ui raised padded text container segment panel-dark">

        {{-- Ikona + numer --}}
        <div style="display:flex; align-items:center; margin-bottom:1em;">
            <i class="big th list icon title-icon"></i>
            <span style="font-size:20px; margin-left:10px; color:#81a0ff;">
                {{ $number ?? '1' }}
            </span>
        </div>

        <hr>

        {{-- Treść zadania --}}
        <div id="question_text" style="font-size:17px; line-height:1.6;">

            {!! $content ?? '
            <ol>
                <li>Utwórz nowy folder o nazwie "leadsite" i otwórz go za pomocą Visual Studio Code.
2. Zainicjuj nowe repozytorium Git w tym folderze.
3. Rozpakuj materiały z LeadSite.zip i otwórz stronę za pomocą VSC Live Server.
4. Upewnij się, że Twoja główna gałąź nazywa się main, używając: git branch -M main.
5. Na koniec zatwierdź zmiany z komunikatem "Początkowy commit".</li>
            </ol>

            <p style="margin-top:20px;">
                <b>A)</b> Wklej poniżej wszelkie polecenia Git/Terminal, których użyłeś
                <br><br>
                <b>B)</b> Dodaj zrzut ekranu z Git Graph lub wynik polecenia:<br>
                <code>git log --all --oneline --graph</code>
            </p>
            ' !!}

        </div>

        {{-- Przycisk "Hide Code" --}}
        <div style="margin-top:30px;">
            <button class="ui button btn-purple" id="codeformshow">Hide Code</button>
        </div>

    </div>

    {{-- Modale --}}
    <div class="ui small modal sessioninfo"></div>
    <div class="ui small modal finishesession"></div>
    <div class="ui small modal submitedquestion"></div>
    <div class="ui small modal networkerror"></div>
    <div class="ui small modal qattention"></div>

    <div class="ui dimmer modals page transition hidden"></div>

</body>
</html>
