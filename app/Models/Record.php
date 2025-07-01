<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $table = "records";
    protected $primaryKey = "id";
    public $incrementing = "true";
    // protected $keyType = "string";
    public $timestamps = "true";
    protected $fillable = [
        "alternatif_id",
        "kriteria_id",
        "sub_kriteria_id",
        "user_id",
        "response_id",
    ];

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }

    public function subKriteria()
    {
        return $this->belongsTo(SubKriteria::class);
    }

    public function userRecord()
    {
        return $this->belongsTo(User::class);
    }
    
    public function response()
    {
        return $this->belongsTo(Response::class);
    }
}
