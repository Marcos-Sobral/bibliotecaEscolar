<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table = 'Autor';
    protected $primaryKey = 'idAutor';

    protected $fillable = ['nomeAutor', 'nacionalidadeAutor'];

    public function livros()
    {
        return $this->belongsToMany(
            Livro::class, 
            'Autor_has_Livro', 
            'Autor_idAutor', 
            'Livro_idLivro'
        );
    }
}