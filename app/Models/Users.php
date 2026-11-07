<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'User';
    protected $primaryKey = 'idUser';

    protected $fillable = [
        'nomeUsuario', 'apelido', 'email', 'senha', 
        'matricula', 'Status', 'dataNascimento', 
        'FotoUser', 'perfil_idperfil'
    ];

    protected $hidden = ['senha'];

    public function perfil()
    {
        return $this->belongsTo(Perfil::class, 'perfil_idperfil', 'idperfil');
    }

    public function emprestimos()
    {
        return $this->hasMany(Emprestimo::class, 'user_idUser', 'idUser');
    }

    public function avaliacoes()
    {
        return $this->hasMany(Avaliacao::class, 'user_idUser', 'idUser');
    }

    public function curtidas()
    {
        return $this->hasMany(CurtidaAvaliacao::class, 'user_idUser', 'idUser');
    }
}