<h1>Lista quizów</h1>

<ul>
@foreach($quizy as $quiz)
    <li>
        <a href="{{ route('quiz.show', $quiz->id) }}">
            {{ $quiz->tytul }}
        </a>
    </li>
@endforeach
</ul>
