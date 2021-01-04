<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'employees';

    protected $guarded = [
        'id',
    ];

    protected $hidden = [
        'employee_uuid'
    ];

    public $timestamps = true;

    protected $fillable = [
        'first_name',
        'last_name',
        'speciality',
        'phone',
    ];

    protected $casts = [
        'id' => 'integer',
        'document_uuid' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'phone' => 'integer',
    ];
}
