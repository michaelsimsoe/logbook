<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function noteType()
    {
        return $this->belongsTo(NoteType::class, 'note_types_id');
    }

    public static function getNotesWithId($tagId)
    {
        $notes = Note::whereHas('tags', function (Builder $query) use ($tagId) {
            $query->where('id', '=', $tagId);
        })->where('user_id', auth()->user()->id)->get();

        return $notes;
    }
}
