<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $table = 'domain2';
    public $timestamps = false;
    // protected $fillable = ['name', 'da', 'pa', 'ref', 'tf', 'cf', 'ree', 'backlinks', 'trust', 'citation', 'adresses', 'referring', 'dr', 'ur', 'dp', 'aby', 'acr', 'add_date', 'history', 'registrar', 'market_place', 'price', 'cate1', 'cate2'];
}
