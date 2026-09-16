<x-layouts::app title="Editar categoria">
    <section lang="pt-BR">
        <h1>Editar categoria</h1>
        <form action="{{ route('categoria.update', $categoria) }}" method="POST">
            @method('PUT')
            @include('categoria.form')
        </form>
    </section>
</x-layouts::app>