<?php

namespace App\Models; // Correct namespace for the model(s)

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'Dname',
        'division',
        'incharge_id'
    ];

    // Relationships
    public function incharge()
    {
        return $this->belongsTo(User::class, 'incharge_id');
    }
}
