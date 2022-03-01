<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $guarded = ['id','updated_at', 'created_at'];

    public function categories(){
        return $this->belongsToMany(Category::class, 'category_job');
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }
}
