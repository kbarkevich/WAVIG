<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WordCombo extends Model
{
    public function word1()
    {
        return $this->hasOne(Word::class, 'id', 'word1_id');
    }
    public function word2()
    {
        return $this->hasOne(Word::class, 'id', 'word2_id');
    }
    public function resevation()
    {
        return $this->get()->resevation;
    }
    public function boat_name()
    {
        return ucfirst($this->word1->text()) + " Mc" + ucfirst($this->word1->text(true)) + "face";
    }
}
