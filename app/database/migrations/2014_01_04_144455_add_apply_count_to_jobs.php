<?php

use Illuminate\Database\Migrations\Migration;

class AddApplyCountToJobs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('job_applications', function($table) {
			$table->timestamp('updated_at')->after('created_on')->default('0000-00-00 00:00:00');
		});

		Schema::table('jobs', function($table) {
			$table->integer('apply_count')->after('views_count')->nullable();
			$table->timestamp('updated_at')->after('created_on')->default('0000-00-00 00:00:00');
		});

		$jobs = Job::all();

		foreach ($jobs as $job) {
			$job->apply_count = count($job->applications);
			$job->save();
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('job_applications', function($table) {
			$table->dropColumn('updated_at');
		});

		Schema::table('jobs', function($table) {
			$table->dropColumn('apply_count');
			$table->dropColumn('updated_at');
		});
	}

}
