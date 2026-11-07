<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Multa extends Model
{
    protected $table = 'Multa';
    protected $primaryKey = 'idMulta';

    protected $fillable = [
        'valor', 'statusPagamento', 'dataGeracao', 'Emprestimo_idEmprestimo'
    ];

    public function emprestimo()
    {
        return $this->belongsTo(Emprestimo::class, 'Emprestimo_idEmprestimo', 'idEmprestimo');
    }
}