<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'runner_id',
        'reported_km',
        'document',
        'comment',
        'date'
    ];

    public function runner()
    {
        return $this->belongsTo(Runner::class);
    }
}
