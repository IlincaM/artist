<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Serverfireteam\Panel\ObservantTrait;

class Pages extends Model {

    use ObservantTrait;

    protected $table = 'pages';
     protected $fillable = [
        'id',
        'title',
        'body',
         'slug',
      
    ];

    public function category() {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function subcategory() {
        return $this->belongsTo('App\Subcategory', 'subcategory_id');
    }
public function typePage() {
        return $this->belongsTo('App\TypePage', 'type_id');
    }
}
