<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubsTable extends Migration
{
    /** @return void
    */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->integer('id_club',6)->increments()->unsigned();
            // $table->increments('id_club',6)->unsigned();       // increments ya pone como ->primary y además autoincremental
            // $table->primary('id_club',6)->unsigned();
            $table->enum('type', array('SportsClub', 'School', 'University', 'Amateur', 'Neighborhood'))->default('SportsClub');
            $table->string('name',45);
            $table->string('shield_url_img',140)->nullable();  // acepta null
            $table->longText('anthem_song')->nullable();       // acepta null
            $table->dateTime('foundation_year_month');         // ->default(getdate());
            $table->string('office_address',45);
            $table->string('office_zip_code',8);
            $table->string('office_town',45);
            $table->string('branding_tshirt',15);
            $table->string('branding_shorts',15);
            $table->string('branding_socks',15);
            $table->string('branding_second_tshirt',15);
            $table->string('branding_second_shorts',15);
            $table->string('branding_second_socks',15);            
            $table->double('anual_budget', 12, 2);          // 12 dígits en total: 10 enters i 2 decimals
            $table->string('phone',9)->unique();            // unique implica que serà index
            $table->string('email',45)->unique();           // unique implica que serà index
            $table->double('palmares', 4, 2)->default(0);   // double p.ej. 3 campeonatos y 2 finales (amb integer duplicava claves PK)
            $table->string('foundator_name',15);
            $table->string('president_name',15);
            $table->string('coach_name',15);
            // gestió usuaris
            $table->string('manager_name',15);
            $table->string('manager_pwd',8);
            $table->rememberToken();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clubs');
    }
}
