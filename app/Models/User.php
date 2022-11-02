<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


Class User extends Model{
    protected $table = "tickets";
    public $timestamps = false;
    protected $fillable = ['usuario','fecha_creacion','fecha_actaulizacion','estatus_id'];


    
    public function estatus(){
        return $this->hasMany(Estatus::class);
    }

}