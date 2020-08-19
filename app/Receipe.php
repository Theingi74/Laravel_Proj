<?php

namespace App;
use App\Category;
use App\Events\ReceipeCreatedEvent;
use App\Mail\ReceipeStored;
use Illuminate\Database\Eloquent\Model;

class Receipe extends Model
{
    protected $fillable = ['name','ingredients','category','author_id'];
   /* protected $guarded = [];*/

   public $dispatchesEvents = [
   		'created' => ReceipeCreatedEvent::class,

   ];

   protected static function boot()
   {
   		parent::boot();
   		static::created(function($receipe){
   			session()->flash("session_message","Receipe has created Successfully with Session flash");
   		});
   		
   }

   public function categories()
   {
   		return $this->belongsTo('App\Category','category');
   }

}
