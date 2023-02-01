<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = ['slug'];
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
        return $this->project_logo_img ? asset("storage/$this->project_logo_img") : null;
    }

}
