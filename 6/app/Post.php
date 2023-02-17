<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected $guarded = array('id');

    // 以下を追記
    public static $rules = array(
        'body' => ['required','string','max:255'],
    );

    use SoftDeletes;
}
