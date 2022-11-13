<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_data92 extends Model
{
    use HasFactory;

    public $table = 'detail_data92';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_user',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'id_agama',
        'foto_ktp',
        'umur'
    ];

    public function user()
    {
        return $this->belongsTo(User92::class, 'id_user', 'id');
    }

    public function agama()
    {
        return $this->belongsTo(Agama92::class, 'id_agama', 'id');
    }
}
