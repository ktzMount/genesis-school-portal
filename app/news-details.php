<?php
/**
 * Página Detalhes do Aviso/Notícia
 */

$news_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
$article = null;

// Tenta buscar do banco
try {
    $stmt = $pdo->prepare("SELECT id, title, date_published as date, category, excerpt, content, image FROM news WHERE id = ?");
    $stmt->execute([$news_id]);
    $article = $stmt->fetch();
} catch (Exception $e) {}

// Fallback hardcoded para o ID 1
if (!$article && $news_id == 1) {
    $article = [
        'id'       => 1,
        'title'    => 'Simulado Aberto ENEM - Sistema Etapa',
        'date'     => 'Próximos Sábados',
        'category' => 'Avaliações',
        'image'    => ASSETS_URL . 'images/enem_1.jpg',
        'content'  => "Estão abertas as inscrições para o Simulado Aberto ENEM do Sistema Etapa!\n\nEsta é uma oportunidade incrível para testar seus conhecimentos e reproduzir fielmente a experiência da prova oficial. O simulado conta com a metodologia de nota TRI (Teoria de Resposta ao Item) e redação nos mesmos moldes do Exame Nacional.\n\nA participação é 100% gratuita, mas as vagas presenciais são limitadas para garantir o distanciamento e conforto de todos.\n\nGaranta agora mesmo a sua participação acessando o link oficial de inscrição abaixo.",
        'cta_url'  => 'https://simuladoenem.sistemaetapa.com.br/?utm_source=SistemaEtapa&utm_medium=PortalAluno&utm_campaign=SEE26&utm_id=SEE',
        'cta_text' => 'Garantir Minha Vaga'
    ];
}

// Se não achar, redireciona
if (!$article) {
    header("Location: ?page=news");
    exit;
}
?>

<!-- Hero Interno -->
<div class="inner-hero">
    <div class="container-lg">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-inner mb-3">
                <li class="breadcrumb-item"><a href="?page=home">Início</a></li>
                <li class="breadcrumb-item"><a href="?page=news">Avisos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalhes</li>
            </ol>
        </nav>
        <span class="unit-hero-badge mb-2 d-inline-block bg-primary text-white"><?php echo htmlspecialchars($article['category']); ?></span>
        <h1 class="inner-hero-title"><?php echo htmlspecialchars($article['title']); ?></h1>
        <p class="text-white-50"><i class="fas fa-calendar-alt me-2"></i><?php echo htmlspecialchars($article['date']); ?></p>
    </div>
</div>

<section class="py-5 bg-light">
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                    <?php if (!empty($article['image'])): ?>
                    <img src="<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>" class="w-100" style="max-height: 500px; object-fit: cover;">
                    <?php endif; ?>
                    
                    <div class="card-body p-4 p-md-5">
                        
                        <div class="fs-5" style="line-height: 1.8; color: #444; white-space: pre-wrap;"><?php echo htmlspecialchars($article['content'] ?? $article['excerpt'] ?? ''); ?></div>
                        
                        <?php if (!empty($article['cta_url'])): ?>
                        <div class="mt-5 p-4 bg-light border rounded-3 text-center">
                            <h4 class="mb-3">Ficou interessado?</h4>
                            <a href="<?php echo htmlspecialchars($article['cta_url']); ?>" target="_blank" rel="noopener" class="btn btn-orange btn-lg px-5">
                                <?php echo htmlspecialchars($article['cta_text'] ?? 'Acessar Link'); ?> <i class="fas fa-external-link-alt ms-2"></i>
                            </a>
                        </div>
                        <?php endif; ?>

                        <div class="mt-5 text-center">
                            <a href="?page=news" class="btn btn-outline-secondary px-4 py-2 rounded-pill">
                                <i class="fas fa-arrow-left me-2"></i> Voltar para Avisos
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
