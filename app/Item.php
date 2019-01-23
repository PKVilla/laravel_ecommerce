<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{	
	//items belongs to category
    public function category(){
    	return $this->belongsTo("\App\Category");
    }
}
