<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'prices';

    protected $guarded = [
        'id',
    ];


    public $timestamps = true;

    protected $fillable = [
        'employee_id',
        'per_hour',
        'fixed',
    ];

    protected $casts = [
        'id' => 'integer',
        'employee_id' => 'integer',
        'per_hour' => 'integer',
        'fixed' => 'integer',
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

}

