<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    //
    use SoftDeletes;
    protected $table = 'expenses';
    protected $guarded = [];

    public function Category(){
        return $this->belongsTo('App\Category', 'category_id', 'category_id');
    }

}
