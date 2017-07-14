<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model

{
    /**
     * Get the choices for the blog post.
     */
    public function choices()
    {
        return $this->hasMany('App\Choice');
    }
}
