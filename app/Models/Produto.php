<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    // Campos que permitimos preencher via formulário
    protected $fillable = [
        'nome',
        'descricao',
        'categoria',
        'quantidade',
        'preco',
        'fornecedor',
        'estoque_minimo',
    ];
    // Retorna true se a quantidade for menor ou igual ao mínimo
    public function estoqueBaixo()
    {
        return $this->quantidade <= $this->estoque_minimo;
    }
}
