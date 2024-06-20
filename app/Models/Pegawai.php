<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory,HasUuids;
    protected $guarded = "id_pegawai";
    protected $primaryKey = "id_pegawai";
    protected $table = "pegawais";
}