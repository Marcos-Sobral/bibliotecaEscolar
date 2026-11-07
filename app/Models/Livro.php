<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $table = 'Livro';
    protected $primaryKey = 'idLivro';

    protected $fillable = [
        'titulo', 'isbn', 'anoPublicacao', 'editora', 
        'descricao', 'capaUrl', 'linkEbook', 'Genero_idGenero'
    ];

    public function genero()
    {
        return $this->belongsTo(Genero::class, 'Genero_idGenero', 'idGenero');
    }

    public function autores()
    {
        return $this->belongsToMany(
            Autor::class, 
            'Autor_has_Livro', 
            'Livro_idLivro', 
            'Autor_idAutor'
        );
    }

    public function exemplares()
    {
        return $this->hasMany(Exemplar::class, 'Livro_idLivro', 'idLivro');
    }

    public function avaliacoes()
    {
        return $this->hasMany(Avaliacao::class, 'Livro_idLivro', 'idLivro');
    }
}