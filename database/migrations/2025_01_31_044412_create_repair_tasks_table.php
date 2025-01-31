<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('repair_tasks', function (Blueprint $table) {
    //         $table->id();
    //         $table->timestamps();
    //     });
    // }
    public function up()
{
    Schema::create('repair_tasks', function (Blueprint $table) {
        $table->id();
        $table->string('product_name');
        $table->text('issue_description');
        $table->foreignId('allocated_employee_id')->constrained('users');
        $table->foreignId('created_by')->constrained('users');
        $table->decimal('estimated_cost', 10, 2)->nullable();
        $table->text('repair_description')->nullable();
        $table->enum('status', [
            'pending',
            'estimate_submitted',
            'approved',
            'rejected',
            'in_progress',
            'completed'
        ])->default('pending');
        $table->boolean('is_approved')->default(false);
        $table->timestamp('completed_at')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repair_tasks');
    }
};
