<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exemplar extends Model
{
    protected $table = 'Exemplar';
    protected $primaryKey = 'idExemplar';

    protected $fillable = [
        'codigoBarras', 'statusCirculacao', 'estadoFisico', 
        'tipoAquisicao', 'dataAquisicao', 'Livro_idLivro'
    ];

    public function livro()
    {
        return $this->belongsTo(Livro::class, 'Livro_idLivro', 'idLivro');
    }

    public function emprestimos()
    {
        return $this->hasMany(Emprestimo::class, 'Exemplar_idExemplar', 'idExemplar');
    }
}