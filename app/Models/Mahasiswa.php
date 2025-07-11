<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'nim', 'kelas', 'prodi_id', 'angkatan'];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}