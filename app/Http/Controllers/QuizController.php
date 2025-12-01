<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Pytanie;
use App\Models\Odpowiedz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    // Lista quizów
    public function index()
    {
        $quizy = Quiz::all();
        return view('console', compact('quizy'));
    }

    // Wyświetl pytanie o numerze $nr
    public function pytanie(Quiz $quiz, $nr)
    {
        // Reset punktów przy uruchomieniu quizu
        if ($nr == 1) {
            session()->forget('punkty');
            session(['punkty' => 0]);
        }

        $pytania = $quiz->pytania()->with('odpowiedzi')->get();

        if (!isset($pytania[$nr - 1])) {
            return redirect()->route('quiz.wynik', ['quiz' => $quiz->id]);
        }

        $pytanie = $pytania[$nr - 1];
        return view('quiz.pytanie', compact('quiz', 'pytanie', 'nr'));
    }

    
    public function submit(Request $request, Quiz $quiz, $nr)
    {
        $request->validate([
            'odpowiedz_id' => 'required|exists:odpowiedzi,id'
        ]);

        $odpowiedz = Odpowiedz::find($request->odpowiedz_id);

        if ($odpowiedz->czy_poprawna) {
            session(['punkty' => session('punkty') + 1]);
        }

        $ilePytan = $quiz->pytania()->count();
        $nast = $nr + 1;

      
        if ($nast > $ilePytan) {
            return redirect()->route('quiz.wynik', ['quiz' => $quiz->id]);
        }

     
        return redirect()->route('quiz.pytanie', [
            'quiz' => $quiz->id,
            'nr'   => $nast
        ]);
    }

  
    public function wynik(Quiz $quiz)
    {
        $punkty = session('punkty', 0);
        $ilePytan = $quiz->pytania()->count();

        session()->forget('punkty');

        return view('quiz.wynik', compact('quiz', 'punkty', 'ilePytan'));
    }
}
