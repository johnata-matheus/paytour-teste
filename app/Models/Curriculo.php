<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'arquivo', 
        'data_envio', 
        'ip_envio',
        'user_id'
    ];

    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
