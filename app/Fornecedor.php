<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{ 
    use SoftDeletes;
    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'site', 'uf', 'email']; // importante pra usar o metodo create sem isso o create nao funciona
    
}
