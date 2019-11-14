<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    public function formatted_text($force_no_y = false)
    {
        return $this->text . (($force_no_y || substr($this->text, -1) == "y") ? "" : ($this->y_suffix ? "y" : ""));
    }
}
