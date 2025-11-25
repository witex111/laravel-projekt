<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SesjaController extends Controller
{
    private $sesje = [
        ['name' => 'ProgZast K15 Laravel1 Basics',      'alert' => false],
        ['name' => 'ProgZast K15 Projekt Kumulatywny',  'alert' => false],
        ['name' => 'ProgZast K15 PHP2',                 'alert' => true],
        ['name' => 'ProgZast K15 PHP1',                 'alert' => false],
        ['name' => 'ProgZast K15 React2 List',          'alert' => false],
        ['name' => 'ProgZast K15 React1 Basics',        'alert' => true],
        ['name' => 'ProgZast GitLocal1 K15',            'alert' => true],
    ];

    // 🔥 PYTANIA PODZIELONE NA SESJE
private $pytania = [

    0 => [
        ['id' => 1, 'view' => 'pytania.0_1'],
        ['id' => 2, 'view' => 'pytania.0_2'],
        ['id' => 3, 'view' => 'pytania.0_3'],
    ],

    1 => [
        ['id' => 1, 'view' => 'pytania.1_1'],
        ['id' => 2, 'view' => 'pytania.1_2'],
        ['id' => 3, 'view' => 'pytania.1_3'],
    ],

    2 => [
        ['id' => 1, 'view' => 'pytania.2_1'],
        ['id' => 2, 'view' => 'pytania.2_2'],
        ['id' => 3, 'view' => 'pytania.2_3'],
    ],

    3 => [
        ['id' => 1, 'view' => 'pytania.3_1'],
        ['id' => 2, 'view' => 'pytania.3_2'],
        ['id' => 3, 'view' => 'pytania.3_3'],
    ],

    4 => [
        ['id' => 1, 'view' => 'pytania.4_1'],
        ['id' => 2, 'view' => 'pytania.4_2'],
        ['id' => 3, 'view' => 'pytania.4_3'],
    ],

    5 => [
        ['id' => 1, 'view' => 'pytania.5_1'],
        ['id' => 2, 'view' => 'pytania.5_2'],
        ['id' => 3, 'view' => 'pytania.5_3'],
    ],

    6 => [
        ['id' => 1, 'view' => 'pytania.6_1'],
        ['id' => 2, 'view' => 'pytania.6_2'],
        ['id' => 3, 'view' => 'pytania.6_3'],
    ],

];




    //  Strona główna
    public function index()
    {
        return view('console', [
            'sesja' => $this->sesje
        ]);
    }

    // 🟣 Wyświetlanie sesji
    public function showSesja($id)
    {
        if (!isset($this->sesje[$id])) {
            abort(404);
        }

        return view('sesja', [
            'sesja'   => $this->sesje[$id],
            'number'  => $id,
            'pytania' => $this->pytania[$id] ?? []
        ]);
    }

    // 🔥 Wyświetlanie pytania
   public function showPytanie($sesjaId, $pytanieId)
{
    if (!isset($this->pytania[$sesjaId][$pytanieId - 1])) {
        abort(404);
    }

    $pytanie = $this->pytania[$sesjaId][$pytanieId - 1];
    $tresc = view($pytanie['view'])->render();

    return view('pytanie', [
        'sesjaId' => $sesjaId,
        'pytanieId' => $pytanie['id'],
        'tresc' => $tresc
    ]);
}

}
