<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallpaper extends Model
{
  protected $guarded = ['id'];

  public static $rules = array(
      'name' => 'required',
    );
}
