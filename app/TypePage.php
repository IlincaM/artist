<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypePage extends Model
{
        protected $table = 'type-page';
public function pages() {
        return $this->hasMany('App\Pages','type-page_id');
    }
}
