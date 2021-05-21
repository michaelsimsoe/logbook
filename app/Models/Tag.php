<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function notes()
    {
        return $this->morphedByMany(Note::class);
    }

    public function links()
    {
        return $this->morphedByMany(Link::class);
    }

    public function fromUser()
    {
        return auth()->user();
    }
}
