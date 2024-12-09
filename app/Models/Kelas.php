<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    /** @use HasFactory<\Database\Factories\KelasFactory> */
    use HasFactory;
    protected $guarded= [];

    public function siswas()
    {
        return $this->hasMany(Siswa::class); // Kelas memiliki banyak siswa
    }
}
