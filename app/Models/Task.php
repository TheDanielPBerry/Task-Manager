<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'priority', 'project_id', 'status'];


    public function scopeFilter($query, array $filters) {
        if($filters['project_id'] ?? false) {
            $query->where('project_id', '=', $filters['project_id']);
        }
        if($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . $filters['search'] . '%')
            ->orWhere('description', 'like', '%' . $filters['search'] . '%');
        }
    }
    public function project() {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
