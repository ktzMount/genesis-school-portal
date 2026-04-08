<?php
/**
 * Página Avisos e Notícias
 */

// Simular lista de avisos
$news = [
    [
        'id' => 1,
        'title' => 'Inscrições para Matrícula Abertas',
        'date' => '27 de março de 2024',
        'category' => 'Matrícula',
        'excerpt' => 'Inscrições para o ano letivo 2024 estão abertas. Aproveite para garantir a vaga do seu filho.',
        'content' => 'Inscrições para o ano letivo 2024 estão abertas. Temos vagas limitadas em todas as séries. Aproveite para garantir a vaga do seu filho. Agende uma visita e conheça nossas instalações.'
    ],
    [
        'id' => 2,
        'title' => 'Calendário Escolar Divulgado',
        'date' => '25 de março de 2024',
        'category' => 'Informações',
        'excerpt' => 'Confira o calendário completo do ano letivo com datas importantes de avaliações e eventos.',
        'content' => 'O calendário escolar de 2024 foi oficialmente divulgado. Confira os períodos de provas, férias e eventos especiais durante o ano.'
    ],
    [
        'id' => 3,
        'title' => 'Projeto Sustentabilidade tem Grande Sucesso',
        'date' => '20 de março de 2024',
        'category' => 'Projetos',
        'excerpt' => 'Alunos participam de projeto de sustentabilidade ambiental com ótimos resultados.',
        'content' => 'Nossos alunos se engajaram em um projeto inovador de sustentabilidade, criando soluções criativas para problemas ambientais da comunidade.'
    ],
    [
        'id' => 4,
        'title' => 'Campeonato de Xadrez 2024',
        'date' => '15 de março de 2024',
        'category' => 'Eventos',
        'excerpt' => 'Genesis School promove campeonato de xadrez com premiações para os vencedores.',
        'content' => 'Campeonato de Xadrez será realizado em abril com a participação de alunos de todas as séries. Inscrições abertas!'
    ],
    [
        'id' => 5,
        'title' => 'Aula de Campo - Museu de Ciências',
        'date' => '10 de março de 2024',
        'category' => 'Atividades',
        'excerpt' => 'Alunos do 5º ano realizam aula de campo no museu de ciências da região.',
        'content' => 'Aula de campo foi realizada com objetivo de enriquecer o conhecimento científico dos alunos do 5º ano.'
    ],
    [
        'id' => 6,
        'title' => 'Novo Laboratório de Informática Inaugurado',
        'date' => '05 de março de 2024',
        'category' => 'Infraestrutura',
        'excerpt' => 'Genesis School inaugura novo laboratório com computadores de última geração.',
        'content' => 'O novo laboratório de informática foi inaugurado com equipamentos modernos para proporcionar melhor experiência aos alunos.'
    ]
];
?>
<div class="container-fluid bg-light py-5">
    <div class="container">
        <h1 class="fw-bold mb-4">Avisos e Notícias</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="?page=home">Início</a></li>
                <li class="breadcrumb-item active">Avisos</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <?php foreach ($news as $article): ?>
                    <div class="col-12 mb-4">
                        <article class="card shadow-sm h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span class="badge bg-primary"><?php echo htmlspecialchars($article['category']); ?></span>
                                    <small class="text-muted">
                                        <i class="fas fa-calendar-alt"></i> <?php echo $article['date']; ?>
                                    </small>
                                </div>
                                <h3 class="card-title fw-bold"><?php echo htmlspecialchars($article['title']); ?></h3>
                                <p class="card-text text-muted"><?php echo htmlspecialchars($article['excerpt']); ?></p>
                                <a href="#" class="btn btn-primary btn-sm">Leia Mais</a>
                            </div>
                        </article>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- Paginação -->
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                    </ul>
                </nav>
            </div>

            <!-- Sidebar -->
            <div class="col-md-4">
                <!-- Busca -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Buscar Avisos</h5>
                        <form class="d-flex">
                            <input type="text" class="form-control" placeholder="Pesquisar...">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Categorias -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">Categorias</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="#" class="text-decoration-none">Matrícula <span class="badge bg-secondary">2</span></a></li>
                            <li class="mb-2"><a href="#" class="text-decoration-none">Eventos <span class="badge bg-secondary">3</span></a></li>
                            <li class="mb-2"><a href="#" class="text-decoration-none">Projetos <span class="badge bg-secondary">1</span></a></li>
                            <li class="mb-2"><a href="#" class="text-decoration-none">Atividades <span class="badge bg-secondary">1</span></a></li>
                            <li><a href="#" class="text-decoration-none">Infraestrutura <span class="badge bg-secondary">1</span></a></li>
                        </ul>
                    </div>
                </div>

                <!-- Avisos em Destaque -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0"><i class="fas fa-star text-warning me-2"></i> Em Destaque</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 pb-3 border-bottom">
                            <h6 class="fw-bold mb-2">Inscrições Abertas</h6>
                            <p class="small text-muted mb-2">27 de março de 2024</p>
                            <p class="small">Vagas disponíveis em todas as séries.</p>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-2">Calendário 2024</h6>
                            <p class="small text-muted mb-2">25 de março de 2024</p>
                            <p class="small">Clique para conferir datas importantes.</p>
                        </div>
                    </div>
                </div>

                <!-- Newsletter -->
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="fw-bold mb-3">Receba Notícias</h5>
                        <p class="text-muted small mb-3">Inscreva-se para receber avisos e notícias em seu email</p>
                        <form>
                            <div class="mb-2">
                                <input type="email" class="form-control" placeholder="Seu email" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Inscrever</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
