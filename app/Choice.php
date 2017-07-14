<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    /**
     * Get the question for the choice(s).
     */
    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
