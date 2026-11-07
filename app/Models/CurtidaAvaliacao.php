<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurtidaAvaliacao extends Model
{
    protected $table = 'CurtidaAvaliacao';
    protected $primaryKey = 'idCurtidaAvaliacao';

    protected $fillable = [
        'dataCriacao', 'Avaliacao_idAvaliacao', 'user_idUser'
    ];

    public function avaliacao()
    {
        return $this->belongsTo(Avaliacao::class, 'Avaliacao_idAvaliacao', 'idAvaliacao');
    }

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_idUser', 'idUser');
    }
}