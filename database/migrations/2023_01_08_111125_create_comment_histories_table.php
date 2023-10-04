<?php

use App\Models\DocmentAssignedDepartment;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(DocmentAssignedDepartment::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->string('department_comment')->nullable();
            $table->string('followup_comment')->nullable();
            $table->string('date');
            $table->string('created_at')->nullable();
            $table->string('updated_at')->nullable();
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
        Schema::dropIfExists('comment_histories');
    }
}
