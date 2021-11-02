<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index () {
        //$fornecedores = ['fornecedor 1','2','3','4','5','6'];
        $fornecedores = [
            0 => ['nome' => 'Fornecedor1', 'status' => 'N'],
            1 => ['nome' => 'Fornecedor2', 'status' => 'S']
        ];
        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
