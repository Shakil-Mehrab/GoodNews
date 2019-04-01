<?php

namespace App\Traits\Eloquent;

trait OrderableTrait
{
     public function scopeLatestTop($query){
       return $query->where('category_id',1)->limit(1)->get();
    }
     public function scopeLatestLatest($query){
       return $query->where('category_id',2)->limit(2)->get();
    }
     public function scopeLatestNational($query){
       return $query->where('category_id',3)->limit(4)->get();
    }
     public function scopeLatestInternational($query){
       return $query->where('category_id',4)->limit(4)->get();
    }
     public function scopeLatestTechnology($query){
       return $query->where('category_id',5)->limit(4)->get();
    }
     public function scopeLatestLatestSport($query){
       return $query->where('category_id',6)->limit(1)->get();
    }
     public function scopeLatestSport($query){
       return $query->where('category_id',6)->limit(6)->get();
    }
     public function scopeLatestPolitics($query){
       return $query->where('category_id',7)->limit(4)->get();
    }
    public function scopeLatestEducation($query){
       return $query->where('category_id',9)->limit(4)->get();
    }
    public function scopeLatestRecreation($query){
       return $query->where('category_id',13)->limit(4)->get();
    }
    public function scopeLatestFinal($query){
       return $query->where('category_id',17)->limit(4)->get();
    }
    
}