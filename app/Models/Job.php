<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'jobs';

    protected $guarded = [
        'id',
    ];


    public $timestamps = true;

    protected $fillable = [
        'employee_id',
        'job_id',
        'title',
        'due_date',
        'status',
        'contact',
    ];

    protected $casts = [
        'id' => 'integer',
        'employee_id' => 'integer',
        'job_id' => 'integer',
        'title' => 'string',
        'due_date' => 'date',
        'status' => 'integer',
        'contact' => 'integer',
    ];

    public function getEmployeeName()
    {
        if ($this->employee_id != NULL) {
            $employee = Employee::where('id', $this->employee_id)->first();
            if ($employee instanceof Employee) {
                return $employee->first_name . ' ' . $employee->last_name;
            }
        }
        return '';
    }

    public function getFixedPrice()
    {
        if ($this->price_id != NULL) {
            $price = Price::where('id', $this->price_id)->first();
            if ($price instanceof Price) {
                return $price->fixed;
            }
        }
        return '';
    }

    public function getJobStatusBadge()
    {
        if ($this->status == 1) {
            return '<span class="badge badge-success">In progress</span>';
        } else{
            return '<span class="badge badge-info">Done</span>';
        }
    }

}

