<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Validator;

class Blog extends Model
{
    
   public function saveRecords(Array $data,$id=''){
   	if($id){
   		$blog=$this->find($id);
   	}else{
   		$blog=$this;
   	}

   	$blog->title=$data['title'];
	$blog->post=$data['posts'];
	$blog->user_id=Auth::user()->id;
	$blog->save();

	return true;

   }
   
   public function Author(){
   	return $this->belongsTo('App\User', 'user_id');
   }

}
