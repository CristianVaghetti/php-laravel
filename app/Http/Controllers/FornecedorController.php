<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index () {
        //$fornecedores = ['fornecedor 1','2','3','4','5','6'];
        $fornecedores = [
            0 => [
                'nome' => 'Fornecedor1', 
                'status' => 'N',
                'cnpj' => '00.00.00/001',
                'ddd' => '11',
                'telefone' => '000000000'
            ],
            1 => [
                'nome' => 'Fornecedor2',
                'status' => 'S',
                'cnpj' => '10.10.10/001',
                'ddd' => '21',
                'telefone' => '000000001'
            ],
            2 => [
                'nome' => 'Fornecedor3',
                'status' => 'N',
                'cnpj' => '20.20.20/002',
                'ddd' => '13',
                'telefone' => '000000002'
            ]
            ];
        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
