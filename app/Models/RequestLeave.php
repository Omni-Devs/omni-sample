<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestLeave extends Model
{
    use HasFactory;

    protected $table = 'request_leaves';

    /**
     * Mass assignable fields
     */
    protected $fillable = [
        'application_datetime',
        'employee_id',
        'workforce_leave_id',
        'period_start',
        'period_end',
        'no_of_days',
        'reason',
        'status',
        'requested_by',
        'requested_datetime',
        'approved_by',
        'approved_datetime',
        'disapproved_by',
        'disapproved_datetime',
        'cancelled_by',
        'cancelled_datetime',
        'completed_by',
        'completed_datetime',
        'attachments'
    ];

    /**
     * Casts
     */
    protected $casts = [
        'application_datetime' => 'datetime',
        'period_start'         => 'datetime',
        'period_end'           => 'datetime',
        'requested_datetime'   => 'datetime',
        'approved_datetime'    => 'datetime',
        'disapproved_datetime' => 'datetime',
        'cancelled_datetime'   => 'datetime',
        'completed_datetime'   => 'datetime',
        'no_of_days'           => 'decimal:2',
        'attachments'          => 'array',
    ];

    /**
     * Relationships
     */

    // Employee requesting the leave
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    // Type of leave (from workforce_leaves table)
    public function leaveType()
    {
        return $this->belongsTo(WorkLeave::class, 'workforce_leave_id');
    }

    public function requester()
    {
        return $this->belongsTo(User::class, 'requested_by');
    }

    // Approved by
    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    // Disapproved by
    public function disapprover()
    {
        return $this->belongsTo(User::class, 'disapproved_by');
    }

    public function cancelledBy()
    {
        return $this->belongsTo(User::class, 'cancelled_by');
    }

    public function completedBy()
    {
        return $this->belongsTo(User::class, 'completed_by');
    }

    /**
     * Helpers
     */

    // Check if leave is pending
    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    // Check if leave is approved
    public function isApproved(): bool
    {
        return $this->status === 'approved';
    }

    // Check if leave is disapproved
    public function isDisapproved(): bool
    {
        return $this->status === 'disapproved';
    }

    // Check if leave is cancelled
    public function isCancelled(): bool
    {
        return $this->status === 'cancelled';
    }
}
