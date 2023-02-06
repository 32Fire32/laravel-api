<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = ['slug', 'technologies'];
    protected $appends = ['image_url'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }

    protected function getImageUrlAttribute()
    {
        return $this->project_logo_img ? asset("storage/$this->project_logo_img") : 'https://via.placeholder.com/300x200/09f/fff.png';
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

}
