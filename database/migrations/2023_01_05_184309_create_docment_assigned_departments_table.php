<?php

use App\Models\Department;
use App\Models\Document;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocmentAssignedDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docment_assigned_departments', function (Blueprint $table) {
            $table->id();
             $table->foreignIdFor(Department::class)->constrained();
             $table->foreignIdFor(Document::class)->constrained();
             $table->foreignIdFor(User::class)->constrained();
             $table->string('assign_date');
             $table->string('deadline');
             $table->tinyInteger('status');
             $table->string('complation_date')->nullable();
             $table->string('outcome')->nullable();
             $table->string('attachments')->nullable();
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
        Schema::dropIfExists('docment_assigned_departments');
    }
}
