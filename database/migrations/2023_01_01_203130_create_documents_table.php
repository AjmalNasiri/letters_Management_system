<?php

use App\Models\RequestedFromToSource;
use App\Models\User;
use App\Models\Document;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
             $table->integer('document_no');
             $table->string('title');
             $table->foreignIdFor(RequestedFromToSource::class)->constrained();
             $table->string('recieved_date');
             $table->string('startup_department')->nullable();
             $table->text('details');
             $table->Uuid(Document::Document_UNIQUE_ID_COLUMN_NAME);
             $table->integer('status');
             $table->string('attachments')->nullable();
             $table->foreignIdFor(User::class)->constrained();
             $table->softDeletes();
             $table->string('created_at')->nullable();
             $table->string('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
