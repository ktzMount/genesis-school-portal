<?php
/**
 * Página Avisos — visual de site escolar, sem sidebar de blog
 */

$news = [
    [
        'id'       => 1,
        'title'    => 'Simulado Aberto ENEM - Sistema Etapa',
        'date'     => 'Próximos Sábados',
        'category' => 'Avaliações',
        'excerpt'  => 'Participe do Simulado Aberto ENEM do Sistema Etapa. Reprodução da experiência da prova oficial com nota TRI e redação. Participação 100% gratuita! Vagas presenciais limitadas.',
        'image'    => ASSETS_URL . 'images/enem_1.jpg',
        'cta_url'  => 'https://simuladoenem.sistemaetapa.com.br/?utm_source=SistemaEtapa&utm_medium=PortalAluno&utm_campaign=SEE26&utm_id=SEE',
        'cta_text' => 'Garantir Minha Vaga'
    ]
];

try {
    $stmt = $pdo->query("SELECT id, title, date_published as date, category, excerpt, content, image FROM news ORDER BY id DESC");
    if ($stmt) {
        $db_news = $stmt->fetchAll();
        foreach ($db_news as $n) {
            if (!empty($n['image'])) $news[] = $n;
        }
    }
} catch (Exception $e) {}
?>

<!-- Hero Interno -->
<div class="inner-hero">
    <div class="container-lg">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-inner mb-3">
                <li class="breadcrumb-item"><a href="?page=home">Início</a></li>
                <li class="breadcrumb-item active">Avisos</li>
            </ol>
        </nav>
        <h1 class="inner-hero-title"><i class="fas fa-bullhorn me-2"></i>Avisos</h1>
        <p class="inner-hero-subtitle">Fique por dentro de tudo que acontece no Colégio Gênesis.</p>
    </div>
</div>

<section class="news-grid-section py-5">
    <div class="container-lg">
        <?php if (empty($news)): ?>
            <div class="text-center py-5">
                <i class="fas fa-bell-slash fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">Nenhum aviso cadastrado no momento.</h4>
            </div>
        <?php else: ?>
        <div class="row g-4">
            <?php foreach ($news as $article): ?>
            <div class="col-md-6 col-lg-4">
                <div class="news-card h-100">
                    <?php if (!empty($article['image'])): ?>
                    <div class="news-card-img-wrapper">
                        <img src="<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>" class="news-card-img">
                        <span class="news-category-badge"><?php echo htmlspecialchars($article['category']); ?></span>
                    </div>
                    <?php endif; ?>
                    <div class="news-card-body">
                        <div class="news-card-date">
                            <i class="fas fa-calendar-alt me-1"></i><?php echo htmlspecialchars($article['date']); ?>
                        </div>
                        <h3 class="news-card-title"><?php echo htmlspecialchars($article['title']); ?></h3>
                        <p class="news-card-excerpt"><?php echo htmlspecialchars($article['excerpt']); ?></p>
                        <a href="?page=news-details&id=<?php echo $article['id']; ?>" class="btn btn-news-cta">
                            Leia Mais <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
