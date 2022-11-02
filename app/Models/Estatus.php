<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Estatus extends Model{
    protected $table = "estatus";
    public $timestamps = false;
    protected $fillable = ['descripcion'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}