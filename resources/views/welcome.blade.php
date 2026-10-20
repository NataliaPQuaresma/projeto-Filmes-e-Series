<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Filmes e Séries</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-neutral-950 text-neutral-100 antialiased">

    <header class="sticky top-0 z-40 backdrop-blur bg-neutral-950/80 border-b border-neutral-800">
        <div class="max-w-6xl mx-auto flex items-center justify-between px-6 py-4">

            <span class="text-xl font-bold tracking-wide text-red-500">🎬 Filmes e Séries</span>

            <nav class="hidden md:flex items-center gap-6 text-sm text-neutral-300">
                <a href="#catalogo" class="hover:text-white transition">Catálogo</a>
                <a href="#recursos" class="hover:text-white transition">Recursos</a>
            </nav>

            @if (Route::has('login'))
                <div class="hidden md:flex items-center gap-3">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                        class="bg-red-600 hover:bg-red-700 px-5 py-2 rounded-lg text-sm font-medium transition">
                            Ir para o painel
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="px-5 py-2 text-sm text-neutral-300 hover:text-white transition">
                            Entrar
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="bg-red-600 hover:bg-red-700 px-5 py-2 rounded-lg text-sm font-medium transition">
                                Cadastrar
                            </a>
                        @endif
                    @endauth
                </div>
            @endif

            <button id="botaoMenu" class="md:hidden text-2xl" aria-label="Abrir menu">☰</button>
        </div>

        <div id="menuCelular" class="hidden md:hidden px-6 pb-4 flex-col gap-3 text-sm">
            <a href="#catalogo" class="block py-2 text-neutral-300">Catálogo</a>
            <a href="#recursos" class="block py-2 text-neutral-300">Recursos</a>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="block py-2 text-red-400">Ir para o painel</a>
                @else
                    <a href="{{ route('login') }}" class="block py-2 text-neutral-300">Entrar</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="block py-2 text-red-400">Cadastrar</a>
                    @endif
                @endauth
            @endif
        </div>
    </header>

    <section class="relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-red-900/30 via-neutral-950 to-neutral-950"></div>

        <div class="relative max-w-4xl mx-auto text-center px-6 py-24">
            <p class="text-red-400 text-sm uppercase tracking-widest mb-4">Seu catálogo pessoal</p>

            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-6">
                Organize <br class="md:hidden">
                <span id="palavra" class="text-red-500 transition-opacity duration-300">filmes</span>
            </h1>

            <p class="text-neutral-400 text-lg max-w-2xl mx-auto mb-10">
                Cadastre filmes e séries, veja o elenco, saiba em qual plataforma
                cada um está e guarde a sua opinião.
            </p>

            <div class="flex flex-wrap justify-center gap-4">
                @guest
                    <a href="{{ route('register') }}"
                       class="bg-red-600 hover:bg-red-700 px-8 py-3 rounded-lg font-semibold transition">
                        Começar agora
                    </a>
                @endguest

                <button id="botaoSortear"
                        class="border border-neutral-700 hover:border-red-500 px-8 py-3 rounded-lg transition">
                    🎲 Sortear um filme
                </button>
            </div>
        </div>
    </section>

    <section id="catalogo" class="max-w-6xl mx-auto px-6 pb-24 scroll-mt-24">

        <h2 class="text-2xl md:text-3xl font-bold text-center mb-8">Veja como fica o catálogo</h2>

        <div class="flex flex-wrap justify-center gap-3 mb-10">
            <button data-genero="Todos"   class="filtro bg-red-600 text-white px-5 py-2 rounded-full text-sm transition">Todos</button>
            <button data-genero="Ação"    class="filtro bg-neutral-800 text-neutral-300 px-5 py-2 rounded-full text-sm transition">Ação</button>
            <button data-genero="Ficção"  class="filtro bg-neutral-800 text-neutral-300 px-5 py-2 rounded-full text-sm transition">Ficção</button>
            <button data-genero="Comédia" class="filtro bg-neutral-800 text-neutral-300 px-5 py-2 rounded-full text-sm transition">Comédia</button>
            <button data-genero="Drama"   class="filtro bg-neutral-800 text-neutral-300 px-5 py-2 rounded-full text-sm transition">Drama</button>
        </div>

        <div id="lista" class="grid grid-cols-2 md:grid-cols-4 gap-5"></div>
    </section>

    <section id="recursos" class="max-w-6xl mx-auto px-6 pb-24 scroll-mt-24">

        <h2 class="text-2xl md:text-3xl font-bold text-center mb-12">O que você pode fazer</h2>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <div class="group bg-neutral-900 border border-neutral-800 hover:border-red-600 rounded-xl p-6 transition">
                <div class="text-3xl mb-3 group-hover:scale-125 transition">🎞️</div>
                <h3 class="font-semibold mb-2">Filmes e séries</h3>
                <p class="text-sm text-neutral-400">Guarde título, sinopse, ano e duração de tudo que você vê.</p>
            </div>

            <div class="group bg-neutral-900 border border-neutral-800 hover:border-red-600 rounded-xl p-6 transition">
                <div class="text-3xl mb-3 group-hover:scale-125 transition">🎭</div>
                <h3 class="font-semibold mb-2">Gêneros</h3>
                <p class="text-sm text-neutral-400">Separe por ação, terror, comédia e muito mais.</p>
            </div>

            <div class="group bg-neutral-900 border border-neutral-800 hover:border-red-600 rounded-xl p-6 transition">
                <div class="text-3xl mb-3 group-hover:scale-125 transition">⭐</div>
                <h3 class="font-semibold mb-2">Atores</h3>
                <p class="text-sm text-neutral-400">Veja quem está no elenco de cada produção.</p>
            </div>

            <div class="group bg-neutral-900 border border-neutral-800 hover:border-red-600 rounded-xl p-6 transition">
                <div class="text-3xl mb-3 group-hover:scale-125 transition">📺</div>
                <h3 class="font-semibold mb-2">Plataformas</h3>
                <p class="text-sm text-neutral-400">Anote onde assistir: Netflix, Prime, Max e outras.</p>
            </div>
        </div>
    </section>

    <footer class="border-t border-neutral-800 py-6 text-center text-sm text-neutral-500">
        Feito com Laravel • Projeto da UPF
    </footer>

    <div id="modal" class="hidden fixed inset-0 z-50 items-center justify-center bg-black/70 px-4">

        <div class="bg-neutral-900 border border-neutral-700 rounded-2xl max-w-md w-full overflow-hidden">

            <div id="modalFaixa" class="h-32 bg-gradient-to-br from-red-700 to-red-950"></div>

            <div class="p-6">
                <p id="modalGenero" class="text-red-400 text-xs uppercase tracking-widest mb-1"></p>
                <h3 id="modalTitulo" class="text-2xl font-bold mb-3"></h3>
                <p id="modalSinopse" class="text-neutral-400 text-sm mb-4"></p>
                <p id="modalInfo" class="text-neutral-500 text-xs mb-6"></p>

                <button id="modalFechar"
                        class="w-full bg-red-600 hover:bg-red-700 py-2 rounded-lg font-medium transition">
                    Fechar
                </button>
            </div>
        </div>
    </div>

    <script>
        const filmes = [
            { titulo: 'Operação Trovão',      genero: 'Ação',    ano: 2022, duracao: 118, plataforma: 'Netflix',     cor: 'from-red-700 to-red-950',
              sinopse: 'Uma equipe especial tem 48 horas para impedir um ataque à cidade.' },
            { titulo: 'Corrida Final',        genero: 'Ação',    ano: 2020, duracao: 104, plataforma: 'Prime Video', cor: 'from-orange-700 to-orange-950',
              sinopse: 'Um piloto aposentado volta às pistas para uma última disputa.' },
            { titulo: 'Missão Estelar',       genero: 'Ficção',  ano: 2021, duracao: 128, plataforma: 'Max',         cor: 'from-indigo-700 to-indigo-950',
              sinopse: 'Astronautas recebem um sinal misterioso vindo de uma lua distante.' },
            { titulo: 'Viagem ao Amanhã',     genero: 'Ficção',  ano: 2023, duracao: 112, plataforma: 'Netflix',     cor: 'from-violet-700 to-violet-950',
              sinopse: 'Uma cientista descobre como visitar o futuro, mas há um preço.' },
            { titulo: 'Noite de Risadas',     genero: 'Comédia', ano: 2019, duracao: 96,  plataforma: 'Disney+',     cor: 'from-amber-600 to-amber-900',
              sinopse: 'Três amigos tentam organizar uma festa surpresa e tudo dá errado.' },
            { titulo: 'Churrasco em Família', genero: 'Comédia', ano: 2022, duracao: 101, plataforma: 'Globoplay',   cor: 'from-yellow-600 to-yellow-900',
              sinopse: 'Um almoço de domingo vira uma confusão com toda a família reunida.' },
            { titulo: 'O Último Verão',       genero: 'Drama',   ano: 2018, duracao: 122, plataforma: 'Prime Video', cor: 'from-emerald-700 to-emerald-950',
              sinopse: 'Antes de se mudar, uma jovem revive os melhores momentos da cidade natal.' },
            { titulo: 'Segredos da Casa',     genero: 'Drama',   ano: 2021, duracao: 115, plataforma: 'Max',         cor: 'from-teal-700 to-teal-950',
              sinopse: 'Ao herdar uma casa antiga, um homem descobre cartas que mudam sua história.' },
        ];

        const lista       = document.getElementById('lista');
        const modal       = document.getElementById('modal');
        const palavra     = document.getElementById('palavra');
        const menuCelular = document.getElementById('menuCelular');

        function mostrarFilmes(genero) {
            const filtrados = filmes.filter(filme => genero === 'Todos' || filme.genero === genero);

            lista.innerHTML = filtrados.map(filme => `
                <button data-titulo="${filme.titulo}"
                        class="cartaz aspect-[2/3] rounded-xl bg-gradient-to-br ${filme.cor}
                               flex flex-col justify-end p-4 text-left
                               hover:-translate-y-2 hover:shadow-xl hover:shadow-black/50 transition">
                    <span class="text-xs text-white/70">${filme.genero} • ${filme.ano}</span>
                    <span class="font-semibold">${filme.titulo}</span>
                </button>
            `).join('');
        }

        const botoesFiltro = document.querySelectorAll('.filtro');

        botoesFiltro.forEach(botao => {
            botao.addEventListener('click', () => {
                botoesFiltro.forEach(b => {
                    b.classList.remove('bg-red-600', 'text-white');
                    b.classList.add('bg-neutral-800', 'text-neutral-300');
                });

                botao.classList.remove('bg-neutral-800', 'text-neutral-300');
                botao.classList.add('bg-red-600', 'text-white');

                mostrarFilmes(botao.dataset.genero);
            });
        });

        function abrirModal(filme) {
            document.getElementById('modalTitulo').textContent  = filme.titulo;
            document.getElementById('modalGenero').textContent  = filme.genero;
            document.getElementById('modalSinopse').textContent = filme.sinopse;
            document.getElementById('modalInfo').textContent    =
                `${filme.ano} • ${filme.duracao} min • Disponível em ${filme.plataforma}`;

            document.getElementById('modalFaixa').className = `h-32 bg-gradient-to-br ${filme.cor}`;

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function fecharModal() {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        lista.addEventListener('click', (evento) => {
            const cartao = evento.target.closest('.cartaz');
            if (!cartao) return;

            const filme = filmes.find(f => f.titulo === cartao.dataset.titulo);
            abrirModal(filme);
        });

        document.getElementById('modalFechar').addEventListener('click', fecharModal);

        modal.addEventListener('click', (evento) => {
            if (evento.target === modal) fecharModal();
        });

        document.addEventListener('keydown', (evento) => {
            if (evento.key === 'Escape') fecharModal();
        });

        document.getElementById('botaoSortear').addEventListener('click', () => {
            const posicao = Math.floor(Math.random() * filmes.length);
            abrirModal(filmes[posicao]);
        });

        const palavras = ['seus filmes', ' suas séries', 'seus favoritos', 'suas maratonas'];
        let indice = 0;

        setInterval(() => {
            palavra.classList.add('opacity-0');

            setTimeout(() => {
                indice = (indice + 1) % palavras.length;
                palavra.textContent = palavras[indice];
                palavra.classList.remove('opacity-0');
            }, 300);
        }, 2500);

        document.getElementById('botaoMenu').addEventListener('click', () => {
            menuCelular.classList.toggle('hidden');
            menuCelular.classList.toggle('flex');
        });

        mostrarFilmes('Todos');
    </script>

</body>
</html>