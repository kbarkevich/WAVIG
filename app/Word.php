<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    public function text($force_no_y = false)
    {
        return $this->get()->text + $force_no_y ? "" : ($this->get()->y_suffix ? "y" : "");
    }
}
