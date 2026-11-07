<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    //Nome da tabela no banco de dados
    protected $table = 'perfil';

    //Chave primária da tabela
    protected $primaryKey = 'idperfil';

    //Campos que podem ser preenchidos em massa (Mass Assignment)
    protected $fillable = [
        'tipoPerfil',
    ];

    /**
     * Um Perfil possui muitos Usuários (User).
     */
    public function users()
    {
        return $this->hasMany(Users::class, 'perfil_idperfil', 'idperfil');
    }
}
