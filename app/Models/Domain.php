<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $table = 'domain2';
    public $timestamps = false;
    protected $fillable = ['domain',
'source',
'tf',
'cf',
'bl',
'rd',
'languages',
'da',
'pa',
'age',
'score',
'redirects',
'history',
'domain_drops',
'total_organic_results',
'semrush_traffic',
'semrush_rank',
'semrush_keyword_number',
'date_added',
'price',
'expiry_date',
'created_at',
'updated_at'];
    
    public static function actionMulti($id_list, $status) {
        return (Domain::whereIn('id', $id_list)->update(['status_seo' => $status]) > 0);
    }
}
