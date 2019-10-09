<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
  protected $guarded = ['id'];

  public static $rules = array(
      'store_name' => 'required',
      'store_adres' => 'required',

    );
}
