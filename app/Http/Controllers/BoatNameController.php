<?php

namespace App\Http\Controllers;

use App\Word;
use App\WordCombo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BoatNameController extends Controller
{
    public function load(Request $request)
    {
        $wordcount = Word::count();
        $word1 = rand(1, $wordcount);
        $word2 = rand(1, $wordcount);
        $wordcombo = !WordCombo::where('word1_id', $word1)->where('word2_id', $word2)->get();
        while ($wordcombo != null && ($wordcombo->is_reserved == true || ($wordcombo->deadline != null && $wordcombo->deadline > time())))
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

    public function send_registration(Request $request)
    {
        $wordcombo = WordCombo::where('id', $request->wordcombo_id)->first();
        $email = $request->email;
        if ($wordcombo == null || ($wordcombo->deadline !== null && $wordcombo->deadline > time()))
        {
            return view('welcome')->with('errors', ['Error registering boat!']);
        }
        $wordcombo->deadline = Carbon::parse(time())->addMinutes(30)->toDateTimeString();
        $wordcombo->reservation = hash("md5", rand(1, 10000000000) . time() . $email);
        $wordcombo->reserved_by = $email;
        $wordcombo->save();
        $wordcombo->send_verification_email($email);
        return view('welcome');
    }

    public function verify(Request $request)
    {
        $reservation = $request->reservation;
        $wordcombo = WordCombo::where('reservation', $reservation)->first();
        if ($wordcombo == null || $wordcombo->is_reserved == true)
        {
            return redirect('/')->with('errors', ['Invalid reservation code!']);
        }
        $wordcombo->is_reserved = true;
        $wordcombo->save();
        return redirect('registered')->with('boatname', ['boatname' => $wordcombo->boat_name(), 'email' => $wordcombo->reserved_by]);
    }

    public function registered(Request $request)
    {
        return view('verified');
    }
}
