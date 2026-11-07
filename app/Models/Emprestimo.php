<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    protected $table = 'Emprestimo';
    protected $primaryKey = 'idEmprestimo';

    protected $fillable = [
        'dataEmprestimo', 'dataPrevistaDevolucao', 'dataDevolucaoEfetiva', 
        'statusEmprestimo', 'quantidadeRenovacoes', 'user_idUser', 'Exemplar_idExemplar'
    ];

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_idUser', 'idUser');
    }

    public function exemplar()
    {
        return $this->belongsTo(Exemplar::class, 'Exemplar_idExemplar', 'idExemplar');
    }

    public function multas()
    {
        return $this->hasMany(Multa::class, 'Emprestimo_idEmprestimo', 'idEmprestimo');
    }
}