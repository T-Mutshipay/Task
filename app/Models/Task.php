<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'status', 'start_date', 'end_date', 'assigned_to', 'created_by'];

    public function parts()
    {
        return $this->hasMany(TaskPart::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function assignments()
    {
        return $this->hasMany(TaskAssignment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}