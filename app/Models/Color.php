<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $guarded = ['id'];

    public static $rules = array(
        'name' => 'required',
      );
}
