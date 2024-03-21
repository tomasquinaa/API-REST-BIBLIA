<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    public $table = "livros";

    protected $fillable = ['posicao', 'nome', 'abreviacao', 'testamento_id'];


    /**
     * Pega o testamento
     */

    public function testamento()
    {
        return $this->belongsTo(Testamento::class);
    }
}
