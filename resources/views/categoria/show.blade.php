<x-layouts::app title="Detalhes da categoria">
    <section lang="pt-BR">
        <h1>Detalhes da categoria</h1>
        <p><strong>Código:</strong> {{ $categoria->id }}</p>
        <p><strong>Nome:</strong> {{ $categoria->nome }}</p>
        <p><strong>Descrição:</strong> {{ $categoria-
>descricao ?? 'Sem descrição' }}</p>
        <a href="{{ route('categoria.edit', $categoria)
}}">Editar</a>
        <a href="{{ route('categoria.index') }}">Voltar</a>
    </section>
</x-layouts::app>