<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
  protected $guarded = ['id'];

  public static $rules = array(
      'contents' => 'required',
      'color_id' => 'required',
  );

  public function color()
  {
      return $this->belongsTo('App\Models\Color');
  }

}
