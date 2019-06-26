<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1559996015MakanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('makanans')) {
            Schema::create('makanans', function (Blueprint $table) {
                $table->increments('id');
                $table->string('makanan')->nullable();
                $table->integer('stok')->nullable()->unsigned();
                $table->text('deskripsi')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('makanans');
    }
}
