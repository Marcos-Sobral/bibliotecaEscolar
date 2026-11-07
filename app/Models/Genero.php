<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table = 'Genero';
    protected $primaryKey = 'idGenero';

    protected $fillable = ['nomeGenero'];

    public function livros()
    {
        return $this->hasMany(Livro::class, 'Genero_idGenero', 'idGenero');
    }
}
