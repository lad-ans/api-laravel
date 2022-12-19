<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResgatePremio extends Model
{
    use HasFactory;
    protected $table = "resgates_premios";
    public $timestamps = false;
}
