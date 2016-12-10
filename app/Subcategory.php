<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Serverfireteam\Panel\ObservantTrait;

class Subcategory extends Model {

    use ObservantTrait;

    protected $table = 'subcategories';

    public function posts() {
        return $this->hasMany('App\Pages', 'subcategory_id');
    }


}
