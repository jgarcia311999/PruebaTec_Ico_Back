<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'runner_id',
        'start_date',
        'frequency',
        'assigned_km'
    ];

    public function runner()
    {
        return $this->belongsTo(Runner::class);
    }
}
