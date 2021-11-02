<h3>FORNECEDOR</H3>

{{'Texto de teste'}}
<?= 'Texto de teste' ?>
{{-- Fica o comentário que o interpretador do blade descarta --}}

@php
    // comentario 1 linha
    /*
        comentarios multiplas linhas
    */
    echo 'Texto de teste';
@endphp

{{--@dd($fornecedores) // imprime array no blade--}} 

{{--@if(count($fornecedores) > 0 && count($fornecedores) < 5) {
    <h3>Existe alguns fornecedores</h3>
} @elseif(count($fornecedores) > 5) {
    <h3>Existe vários fornecedores</h3>
} @else {
    <h3>Ainda não existe fornecedores</h3>
}
@endif--}}
<br>
{{--@if($fornecedores[0]['status'] == 'N')
    Fornecedor inativo
@endif--}}

@isset($fornecedores)
    @for($i = 0; isset($fornecedores[$i]); $i++)
    Fornecedor: {{$fornecedores[$i]['nome']}}<br>
    Status: {{$fornecedores[$i]['status']}}<br>
    CNPJ: {{$fornecedores[$i]['cnpj']}}<br>
    DDD: {{$fornecedores[$i]['ddd'] ?? ''}}<br>
    Telefone: {{$fornecedores[$i]['telefone'] ?? ''}}<br>
    <hr>
    @endfor

@endisset
