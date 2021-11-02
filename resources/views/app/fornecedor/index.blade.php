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
Fornecedor: {{$fornecedores[0]['nome']}}<br>
Status: {{$fornecedores[0]['status']}}<br>

@if($fornecedores[0]['status'] == 'N')
    Fornecedor inativo
@endif
