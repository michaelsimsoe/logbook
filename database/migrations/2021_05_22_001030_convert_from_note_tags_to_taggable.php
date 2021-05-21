<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConvertFromNoteTagsToTaggable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::table('note_tag')->orderBy('tag_id')->chunk('1000', function ($rows) {
            foreach ($rows as $row) {
                //convert object to array
                \DB::table('taggables')->insert(
                    array('taggable_id' => $row->note_id, 'taggable_type' => 'App\Models\Note', 'tag_id' => $row->tag_id)
                );
            }
        });
    }
}
