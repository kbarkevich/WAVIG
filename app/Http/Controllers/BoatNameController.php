<?php

namespace App\Http\Controllers;

use App\Word;
use App\WordCombo;
use Illuminate\Http\Request;

class BoatNameController extends Controller
{
    public function load(Request $request)
    {
        $wordcount = Word::count();
        $word1 = rand(1, $wordcount);
        $word2 = rand(1, $wordcount);
        $wordcombo = !WordCombo::where('word1_id', $word1)->where('word2_id', $word2)->get();
        while ($wordcombo != null && ($wordcombo->deadline != null && $wordcombo->deadline > time()))
        {
            $word1 = rand(1, $wordcount);
            $word2 = rand(1, $wordcount);
            $wordcombo = !WordCombo::where('word1_id', $word1)->where('word2_id', $word2)->get();
        }
        if ($wordcombo == null)
        {
            $wordcombo = new WordCombo([
                'word1_id' => $word1,
                'word2_id' => $word2,
            ]);
            $wordcombo->save();
        }
        return view('boatname', compact('wordcombo'));
    }
}
