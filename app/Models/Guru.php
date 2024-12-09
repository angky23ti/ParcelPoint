<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    /** @use HasFactory<\Database\Factories\GuruFactory> */
    use HasFactory;
    protected $guarded= [];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class); // Siswa berafiliasi dengan Kelas
    }
}
