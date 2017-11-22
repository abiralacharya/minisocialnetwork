<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //protected $table = 'nameOfTable';

    //to avoid  mass assignment exception
    protected $fillable = [
      'user_id', 'content', 'live', 'post_on'
    ];

    //protected $guarded=['id'];

    public function setLiveAttribute($value)
    {
      $this->attributes['live'] = (boolean)($value);
    }
}
