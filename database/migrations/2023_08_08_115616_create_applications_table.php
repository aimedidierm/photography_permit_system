<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->boolean('rwandan')->default(true);
            $table->enum('documentType', ['passport', 'id']);
            $table->string('documentNumber');
            $table->string('placeIssue');
            $table->date('dateIssue');
            $table->date('dateExpiry')->nullable();
            $table->string('profession');
            $table->string('title');
            $table->string('genre');
            $table->date('shootingDateStart');
            $table->date('shootingDateEnd');
            $table->string('stayDuration')->nullable();
            $table->string('location');
            $table->text('description');
            $table->string('letter');
            $table->string('identification');
            $table->string('recomendation');
            $table->string('CV');
            $table->string('synopsis');
            $table->string('ipCertificate')->nullable();
            $table->string('card')->nullable();
            $table->string('other')->nullable();
            $table->string('rra');
            $table->string('rejectionComment')->nullable();
            $table->enum('status', ['pending', 'payed', 'approved', 'rejected'])->default('pending');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->on('users')->references('id')->onDelete("CASCADE");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
