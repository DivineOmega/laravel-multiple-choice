<?php

namespace DivineOmega\LaravelMultipleChoice\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Choice extends Model
{
    use SoftDeletes;

    protected $table = 'lmc_choices';

    public function question()
    {
        return $this->belongsTo('DivineOmega\LaravelMultipleChoice\Models\Question');
    }

    public function responseItem()
    {
        return $this->hasMany('DivineOmega\LaravelMultipleChoice\Models\ResponseItem');
    }
}