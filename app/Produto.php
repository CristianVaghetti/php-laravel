<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    Protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];
}
