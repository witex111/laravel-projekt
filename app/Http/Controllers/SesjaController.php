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

    public function index()
    {
        return view('console', ['sesja' => $this->sesje]);
    }

    public function show($id)
    {
        if (!isset($this->sesje[$id])) {
            abort(404);
        }

        // główny widok  sesja.blade.php,pozostałe sesja.blade_1.php, sesja.blade_2.php, itd.
        
       $viewName = $id == 0 
    ? 'sesja'
    : 'sesja_' . $id;


        if (!view()->exists($viewName)) {
            abort(404, "Widok $viewName nie istnieje!");
        }

        return view($viewName, [
            'sesja' => $this->sesje[$id],
            'number' => $id 
        ]);
    }
}
