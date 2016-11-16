<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoustosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('goustos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->box_type('field_name');
			$table->title('field_name');
			$table->slug('field_name');
			$table->short_title('field_name');
			$table->calories_kcal('field_name');
			$table->protein_grams('field_name');
			$table->fat_grams('field_name');
			$table->bs_grams('carfield_name');
			$table->bulletpoint1('field_name');
			$table->bulletpoint2('field_name');
			$table->bulletpoint3('field_name');
			$table->recipe_diet_type_id('field_name');
			$table->season('field_name');
			$table->base('field_name');
			$table->protein_source('field_name');
			$table->preparation_time_minutes('field_name');
			$table->shelf_life_days('field_name');
			$table->equipment_needed('field_name');
			$table->origin_country('field_name');
			$table->recipe_cuisine('field_name');
			$table->in_your_box('field_name');
			$table->gousto_reference('field_name');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('goustos');
	}

}
