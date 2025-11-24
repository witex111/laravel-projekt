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
<div id="openQuestionModal" 
     style="cursor:pointer; width:50px; height:50px; background:#ddd; border-radius:8px; display:flex; align-items:center; justify-content:center;">
    <svg width="26" height="26" viewBox="0 0 24 24" fill="#444">
        <rect x="3"  y="3"  width="4" height="4"/>
        <rect x="10" y="3"  width="4" height="4"/>
        <rect x="17" y="3"  width="4" height="4"/>
        <rect x="3"  y="10" width="4" height="4"/>
        <rect x="10" y="10" width="4" height="4"/>
        <rect x="17" y="10" width="4" height="4"/>
        <rect x="3"  y="17" width="4" height="4"/>
        <rect x="10" y="17" width="4" height="4"/>
        <rect x="17" y="17" width="4" height="4"/>
    </svg>
</div>
<div id="questionModal" style="
    display:none;
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(0,0,0,0.6);
    justify-content: center;
    align-items: center;
    z-index: 9999;
">
    <div style="
        background: #fff;
        width: 600px;
        border-radius: 6px;
        padding: 25px;
        color: #333;
    ">
        <h3 style="margin:0 0 20px 0;">Select a question</h3>

        <div style="
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 6px;
            display: flex;
            justify-content: center;
            gap: 25px;
        ">

            <!-- aktywne pytanie -->
            <button class="q-btn q-active" data-q="1"
                style="background:#f57c00; color:white; padding:10px 18px; border-radius:6px; border:none; cursor:pointer; font-weight:bold;">
                🔓 1
            </button>

            <button class="q-btn q-active" data-q="2"
                style="background:#f57c00; color:white; padding:10px 18px; border-radius:6px; border:none; cursor:pointer; font-weight:bold;">
                🔓 2
            </button>

            <button class="q-btn q-active" data-q="3"
                style="background:#f57c00; color:white; padding:10px 18px; border-radius:6px; border:none; cursor:pointer; font-weight:bold;">
                🔓 3
            </button>

            <!-- zamkniete pytania -->
            <button class="q-btn q-locked"
                style="background:#e5e5e5; color:#777; padding:10px 18px; border-radius:6px; border:none; cursor:not-allowed; font-weight:bold;">
                🔒 4
            </button>

            <button class="q-btn q-locked"
                style="background:#e5e5e5; color:#777; padding:10px 18px; border-radius:6px; border:none; cursor:not-allowed; font-weight:bold;">
                🔒 5
            </button>

        </div>

        <div style="text-align:right; margin-top:20px;">
            <button id="closeQuestionModal" style="
                background:#ddd; border:none; padding:8px 20px;
                border-radius:6px; cursor:pointer; color:#333;
            ">Back</button>
        </div>
    </div>
</div>
<script>
    // Otwieranie modalu
    document.getElementById("openQuestionModal").onclick = function () {
        document.getElementById("questionModal").style.display = "flex";
    };

    // Zamykanie modalu
    document.getElementById("closeQuestionModal").onclick = function () {
        document.getElementById("questionModal").style.display = "none";
    };

    // Aktywne pytania
    document.querySelectorAll(".q-active").forEach(btn => {
        btn.onclick = function () {
            const q = this.dataset.q;
           window.location.href = "http://127.0.0.1:8000/sesja/pytanie/" + q;

        };
    });
</script>

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
                <li>Utwórz nowy folder o nazwie "leadsite" i otwórz go za pomocą Visual Studio Code.</li>
                <li>Zainicjuj nowe repozytorium Git w tym folderze.</li>
                <li>Rozpakuj materiały z LeadSite.zip i otwórz stronę za pomocą VSC Live Server.</li>
                <li>Upewnij się, że Twoja główna gałąź nazywa się main, używając: git branch -M main.</li>
                <li>Na koniec zatwierdź zmiany z komunikatem "Początkowy commit".</li>
            </ol>

            <p style="margin-top:20px;">
                Proszę pamiętać:
                Do tego ćwiczenia NIE instaluj Breeze.
                Możesz również użyć domyślnej bazy danych SQLite bez korzystania z bazy danych MySQL.
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
