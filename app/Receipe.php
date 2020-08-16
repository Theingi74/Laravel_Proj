<?php

namespace App;
use App\Category;
use App\Mail\ReceipeStored;

use Illuminate\Database\Eloquent\Model;

class Receipe extends Model
{
    protected $fillable = ['name','ingredients','category','author_id'];
   /* protected $guarded = [];*/

   protected static function boot()
   {
   		parent::boot();
   		static::created(function($receipe){
   			session()->flash("session_message","Receipe has created Successfully with Session flash");
            \Mail::to('theingi.htun74@gmail.com')->send(new ReceipeStored($receipe));
   		});
   		
   }

   public function categories()
   {
   		return $this->belongsTo('App\Category','category');
   }

}
