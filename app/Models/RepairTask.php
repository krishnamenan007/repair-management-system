<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RepairTask extends Model
{
    protected $fillable = [
        'product_name',
        'issue_description',
        'allocated_employee_id',
        'created_by',
        'estimated_cost',
        'repair_description',
        'status',
        'is_approved',
        'completed_at'
    ];

    protected $casts = [
        'completed_at' => 'datetime',
        'is_approved' => 'boolean',
    ];

    public function employee()
    {
        return $this->belongsTo(User::class, 'allocated_employee_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}