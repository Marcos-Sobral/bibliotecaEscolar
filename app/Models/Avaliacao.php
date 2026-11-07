<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    protected $table = 'Avaliacao';
    protected $primaryKey = 'idAvaliacao';

    protected $fillable = [
        'nota', 'comentario', 'dataCriacao', 'Livro_idLivro', 'user_idUser'
    ];

    public function livro()
    {
        return $this->belongsTo(Livro::class, 'Livro_idLivro', 'idLivro');
    }

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_idUser', 'idUser');
    }

    public function curtidas()
    {
        return $this->hasMany(CurtidaAvaliacao::class, 'Avaliacao_idAvaliacao', 'idAvaliacao');
    }
}