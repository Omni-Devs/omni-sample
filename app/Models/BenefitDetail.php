<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BenefitDetail extends Model
{
    protected $table = 'benefit_details';

    protected $fillable = [
        'benefit_id',
        'salary_rate_from',
        'salary_rate_to',
        'employer_share',
        'employee_share',
        'employer_share_type',
        'employee_share_type',
    ];

    public function benefit()
    {
        return $this->belongsTo(Benefit::class);
    }
}
