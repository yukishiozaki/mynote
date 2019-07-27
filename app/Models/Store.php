<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
  protected $guarded = ['id'];

  public static $rules = array(
      'store_name' => 'required',
      'store_adres' => 'required',
  );

  public function category()
  {
      return $this->belongsTo('App\Models\Category');
  }
}
