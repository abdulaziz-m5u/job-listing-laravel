<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'updated_at', 'created_at'];

    public function jobs(){
        return $this->hasMany(Job::class);
    }
}
