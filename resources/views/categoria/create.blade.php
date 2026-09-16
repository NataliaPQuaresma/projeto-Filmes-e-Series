<x-layouts::app title="Nova categoria">
    <section lang="pt-BR">
        <h1>Nova categoria</h1>
        <form action="{{ route('categoria.store') }}" method="POST">
            @include('categoria.form')
        </form>
    </section>
</x-layouts::app>