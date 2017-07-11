<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    // Table Name (if we did not want to keep the table name as Games, then rename here)
    // Or keep as it is
    protected $table = 'games';  // games is what the table is called (default)
    // Primary key
    public $primaryKey = 'id';   // or another field it we want; (default)
    // Timestamps
    public $timestamps = true;   // this is default; could put false
}
