<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Runner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'team_id',
        'email',
        'total_km'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}