<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CsvFile extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email',
    ];

    protected $table = 'csv_file';

    protected $dates = [
        'created_at', 'updated_at'
    ];
}
