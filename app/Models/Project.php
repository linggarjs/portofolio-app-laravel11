<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'skills',
        'image',
        'short_description',
        'description',
    ];
    
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'project_skill', 'project_id', 'skill_id');
    }
}
