<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoteTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note_tag', function (Blueprint $table) {
            $table->primary(['note_id', 'tag_id']);
            
            $table->foreignId('note_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            ;
            $table->foreignId('tag_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes_tags');
    }
}
