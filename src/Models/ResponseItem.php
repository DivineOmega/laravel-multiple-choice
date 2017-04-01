<?php

namespace DivineOmega\LaravelMultipleChoice\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResponseItem extends Model
{
    use SoftDeletes;

    protected $table = 'lmc_response_items';

    public function response()
    {
        return $this->belongsTo('DivineOmega\LaravelMultipleChoice\Models\Response');
    }

    public function question()
    {
        return $this->belongsTo('DivineOmega\LaravelMultipleChoice\Models\Question');
    }

    public function choice()
    {
        return $this->belongsTo('DivineOmega\LaravelMultipleChoice\Models\Choice');
    }
}