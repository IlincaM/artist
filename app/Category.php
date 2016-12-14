<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Serverfireteam\Panel\ObservantTrait;

class Category extends Model {
	use ObservantTrait;
	
    protected $table = 'categories';
    public function pages() {
        return $this->hasMany('App\Pages','category_id');
    }
      public function subcategories() {
        return $this->hasMany('App\Subcategory','category_id');
    }
}
