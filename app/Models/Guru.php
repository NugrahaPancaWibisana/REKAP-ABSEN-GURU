<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    /** @use HasFactory<\Database\Factories\GuruFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function kehadiran()
    {
        return $this->hasMany(Kehadiran::class, 'guru_id');
    }
}
