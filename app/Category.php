<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Serverfireteam\Panel\ObservantTrait;

class Category extends Model {
	use ObservantTrait;
	
    protected $table = 'categories';
    public function posts() {
        return $this->hasMany('App\Pages','category_id');
    }
}
