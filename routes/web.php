<?php

use Illuminate\Support\Facades\Route;
use App\Models\Perfil;
use App\Models\Users;
use App\Models\Autor;
use App\Models\Genero;
use App\Models\Livro;
use App\Models\Exemplar;
use App\Models\Emprestimo;
use App\Models\Multa;
use App\Models\Avaliacao;
use App\Models\CurtidaAvaliacao;

Route::get('/teste', function () {
    // 1. Perfil e Usuário (Users)
    $perfil = Perfil::create([
        'tipoPerfil' => 'Aluno'
    ]);

    $usuario = Users::create([
        'nomeUsuario' => 'joao_silva',
        'apelido' => 'João',
        'email' => 'joao@email.com',
        'senha' => bcrypt('senha123'),
        'matricula' => '2026999',
        'Status' => 'Ativo',
        'dataNascimento' => '2004-10-10',
        'perfil_idperfil' => $perfil->idperfil
    ]);

    // 2. Gênero e Autor
    $genero = Genero::create([
        'nomeGenero' => 'Ficção Científica'
    ]);

    $autor = Autor::create([
        'nomeAutor' => 'Isaac Asimov',
        'nacionalidadeAutor' => 'Russo-Americano'
    ]);

    // 3. Livro (e vínculo com Autor via tabela pivot)
    $livro = Livro::create([
        'titulo' => 'Fundação',
        'isbn' => '978-85-7657-something',
        'anoPublicacao' => '1951-05-01',
        'editora' => 'Aleph',
        'descricao' => 'Uma obra clássica de ficção científica.',
        'Genero_idGenero' => $genero->idGenero
    ]);

    // Vincula o autor ao livro na tabela pivot Autor_has_Livro
    $livro->autores()->attach($autor->idAutor);

    // 4. Exemplar
    $exemplar = Exemplar::create([
        'codigoBarras' => 'BARCODE123456',
        'statusCirculacao' => 'Emprestado',
        'estadoFisico' => 'Bom',
        'tipoAquisicao' => 'Compra',
        'dataAquisicao' => now(),
        'Livro_idLivro' => $livro->idLivro
    ]);

    // 5. Empréstimo
    $emprestimo = Emprestimo::create([
        'dataEmprestimo' => now(),
        'dataPrevistaDevolucao' => now()->addDays(14),
        'statusEmprestimo' => 'Ativo',
        'quantidadeRenovacoes' => 0,
        'user_idUser' => $usuario->idUser,
        'Exemplar_idExemplar' => $exemplar->idExemplar
    ]);

    // 6. Multa
    $multa = Multa::create([
        'valor' => 5.00,
        'statusPagamento' => 'Pendente',
        'Emprestimo_idEmprestimo' => $emprestimo->idEmprestimo
    ]);

    // 7. Avaliação
    $avaliacao = Avaliacao::create([
        'nota' => 5,
        'comentario' => 'Livro absolutamente incrível!',
        'Livro_idLivro' => $livro->idLivro,
        'user_idUser' => $usuario->idUser
    ]);

    // 8. Curtida na Avaliação
    $curtida = CurtidaAvaliacao::create([
        'Avaliacao_idAvaliacao' => $avaliacao->idAvaliacao,
        'user_idUser' => $usuario->idUser
    ]);

    // Retorna a estrutura carregando as relações para teste
    return response()->json([
        'mensagem' => 'Simulação de todas as models realizada com sucesso!',
        'dados' => [
            'usuario' => $usuario->load('perfil'),
            'livro' => $livro->load(['genero', 'autores', 'exemplares', 'avaliacoes']),
            'emprestimo' => $emprestimo->load(['user', 'exemplar', 'multas']),
            'avaliacao' => $avaliacao->load(['curtidas'])
        ]
    ]);
});

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
