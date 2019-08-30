<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswaModel extends Model
{
    protected $table = 'tb_siswa';
    protected $fillable = [
        'nama','kelas'
    ];
}
