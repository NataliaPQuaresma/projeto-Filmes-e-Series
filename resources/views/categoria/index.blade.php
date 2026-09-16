<x-layouts::app title="Categoria">
    <section lang="pt-BR">
        <h1>Categorias</h1>
        @if (session('sucesso'))
        <p role="status">
            {{ session('sucesso') }}
        </p>
        @endif
        <p><a href="{{ route('categoria.create') }}">Nova categoria</a></p>
        <table>
            <caption>Lista de categorias cadastradas</caption>
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categoria as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nome }}</td>
                    <td>{{ $categoria->descricao ?? 'Sem descrição' }}</td>
                    <td>
                        <a href="{{ route('categoria.show', $categoria) }}">Ver</a>
                        <a href="{{ route('categoria.edit', $categoria) }}">Editar</a>
                        <form action="{{ route('categoria.destroy', $categoria) }}" method="POST"
                            onsubmit="return confirm('Deseja excluir esta categoria?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Nenhuma categoria cadastrada.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </section>
</x-layouts::app>