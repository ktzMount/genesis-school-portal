<?php
/**
 * Página Home
 */

// Carrega dados de eventos e avisos para a faixa dinâmica
$events = [];
$news = [];
try {
    $stmt_ev = $pdo->query("SELECT id, title, event_date as date, type FROM events ORDER BY event_date DESC LIMIT 1");
    if ($stmt_ev) $events = $stmt_ev->fetchAll();
} catch (Exception $e) {}
try {
    $stmt_nw = $pdo->query("SELECT id, title, date_published as date, category FROM news ORDER BY id DESC LIMIT 1");
    if ($stmt_nw) $news = $stmt_nw->fetchAll();
} catch (Exception $e) {}

// Hardcoded fallback caso DB vazio
if (empty($events)) {
    $events = [['id' => 1, 'title' => 'Mostra Literária do 9º Ano B', 'date' => date('Y') . '-09-15', 'type' => 'Cultural']];
}
if (empty($news)) {
    $news = [['id' => 1, 'title' => 'Simulado Aberto ENEM - Sistema Etapa', 'date' => 'Próximos Sábados', 'category' => 'Avaliações']];
}
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container-lg">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-location mb-4">
                    <i class="fas fa-map-marker-alt me-2"></i>
                    <span>Sorocaba, SP</span>
                </div>
                <h1 class="hero-title">Transformando o <span class="highlight">futuro!</span></h1>
                <p class="hero-subtitle">O Colégio Gênesis oferece ensino de qualidade com foco no desenvolvimento integral do aluno, combinando tradição pedagógica e inovação.</p>
                <div class="hero-buttons mt-4">
                    <a href="#contato" class="btn btn-orange btn-lg me-3">
                        <i class="fas fa-calendar-check me-2"></i>Agende uma Visita
                    </a>
                    <a href="?page=enrollment" class="btn btn-outline-orange btn-lg">
                        <i class="fas fa-user-plus me-2"></i>Matricule-se
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="logo-container">
                    <img src="<?php echo ASSETS_URL; ?>images/logo-genesis.png" alt="Colégio Gênesis" class="logo-rotating" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Faixa de Avisos Dinâmica -->
<?php
// Pega o item mais recente entre eventos e avisos
$latest_strip = null;
$latest_strip_type = null;
try {
    // Verifica último evento cadastrado
    if (!empty($events)) {
        $last_ev = end($events);
        $latest_strip = $last_ev;
        $latest_strip_type = 'event';
    }
    // Verifica último aviso cadastrado
    if (!empty($news)) {
        $last_nw = $news[0];
        $latest_strip = $last_nw;
        $latest_strip_type = 'news';
    }
} catch(Exception $e) { }
?>
<div class="avisos-strip">
    <div class="container-lg">
        <div class="d-flex align-items-center justify-content-center gap-3 flex-wrap">
            <span class="avisos-strip-badge"><i class="fas fa-bullhorn me-1"></i> Novidades</span>
            <?php if ($latest_strip): ?>
            <a href="?page=<?php echo $latest_strip_type === 'event' ? 'event-details' : 'news-details'; ?>&id=<?php echo $latest_strip['id']; ?>" class="avisos-strip-link fw-bold">
                Ver <?php echo $latest_strip_type === 'event' ? 'Evento' : 'Aviso'; ?> <i class="fas fa-arrow-right ms-1"></i>
            </a>
            <?php else: ?>
            <span class="avisos-strip-text">Confira nossos últimos eventos e comunicados!</span>
            <?php endif; ?>
            <span class="avisos-strip-sep d-none d-sm-inline">|</span>
            <a href="?page=events" class="avisos-strip-link">Eventos <i class="fas fa-arrow-right ms-1"></i></a>
            <a href="?page=news" class="avisos-strip-link">Avisos <i class="fas fa-arrow-right ms-1"></i></a>
        </div>
    </div>
</div>

<!-- Seção Nossas Unidades -->
<section class="units-section py-5">
    <div class="container-lg">
        <div class="text-center mb-5">
            <p class="section-label">INFRAESTRUTURA DE PONTA</p>
            <h2 class="section-title">Conheça as Nossas Unidades</h2>
            <p class="section-subtitle">Dois espaços modernos e completos, pensados para proporcionar o melhor ambiente de aprendizado para cada fase escolar.</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-6">
                <a href="?page=unidade1" class="text-decoration-none">
                    <div class="unit-card card shadow-sm border-0 overflow-hidden h-100">
                        <div class="unit-card-img-wrapper">
                            <img src="<?php echo ASSETS_URL; ?>images/unidade_1.jpg" class="unit-card-img" alt="Unidade 1 - Maternal e Educação Infantil">
                            <div class="unit-card-overlay">
                                <i class="fas fa-search-plus fa-2x text-white"></i>
                            </div>
                        </div>
                        <div class="card-body text-center p-4">
                            <div class="unit-badge mb-2">Unidade 1</div>
                            <h4 class="fw-bold text-primary mb-1">Maternal e Educação Infantil</h4>
                            <p class="text-muted small mb-3">R. Dr. Bráulio Guedes da Silva, 116 — Jd. Santa Rosália</p>
                            <span class="text-orange small fw-bold mt-1 d-inline-block">Ver Detalhes <i class="fas fa-arrow-right ms-1"></i></span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <a href="?page=unidade2" class="text-decoration-none">
                    <div class="unit-card card shadow-sm border-0 overflow-hidden h-100">
                        <div class="unit-card-img-wrapper">
                            <img src="<?php echo ASSETS_URL; ?>images/unidade_2.jpg" class="unit-card-img" alt="Unidade 2 - Ensino Fundamental e Médio">
                            <div class="unit-card-overlay">
                                <i class="fas fa-search-plus fa-2x text-white"></i>
                            </div>
                        </div>
                        <div class="card-body text-center p-4">
                            <div class="unit-badge mb-2">Unidade 2</div>
                            <h4 class="fw-bold text-primary mb-1">Ensino Fundamental e Médio</h4>
                            <p class="text-muted small mb-3">R. Aparecida, 1470 — Jd. Santa Rosália</p>
                            <span class="text-orange small fw-bold mt-1 d-inline-block">Ver Detalhes <i class="fas fa-arrow-right ms-1"></i></span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Seção Missão, Visão e Valores -->
<section class="mvv-section py-5">
    <div class="container-lg">
        <div class="text-center mb-5">
            <h2 class="section-title">Missão, Visão e Valores</h2>
        </div>
        <div class="row g-4 justify-content-center">

            <!-- Card Missão -->
            <div class="col-md-4">
                <div class="mvv-card mvv-card--blue">
                    <div class="mvv-screws">
                        <span class="mvv-screw mvv-screw--tl"></span>
                        <span class="mvv-screw mvv-screw--tr"></span>
                        <span class="mvv-screw mvv-screw--bl"></span>
                        <span class="mvv-screw mvv-screw--br"></span>
                    </div>
                    <div class="mvv-card-inner">
                        <div class="mvv-logo-area">
                            <img src="<?php echo ASSETS_URL; ?>images/logo-genesis.png" alt="Gênesis" class="mvv-logo">
                        </div>
                        <div class="mvv-number">1</div>
                        <h3 class="mvv-title">MISSÃO</h3>
                        <p class="mvv-text">Transformar a educação, constituindo um cidadão consciente, responsável e feliz.</p>
                    </div>
                </div>
            </div>

            <!-- Card Visão -->
            <div class="col-md-4">
                <div class="mvv-card mvv-card--blue">
                    <div class="mvv-screws">
                        <span class="mvv-screw mvv-screw--tl"></span>
                        <span class="mvv-screw mvv-screw--tr"></span>
                        <span class="mvv-screw mvv-screw--bl"></span>
                        <span class="mvv-screw mvv-screw--br"></span>
                    </div>
                    <div class="mvv-card-inner">
                        <div class="mvv-logo-area">
                            <img src="<?php echo ASSETS_URL; ?>images/logo-genesis.png" alt="Gênesis" class="mvv-logo">
                        </div>
                        <div class="mvv-number">2</div>
                        <h3 class="mvv-title">VISÃO</h3>
                        <p class="mvv-text">Ser uma instituição de referência, oferecendo ensino de qualidade, transformando crianças e jovens em agentes colaborativos na sociedade.</p>
                    </div>
                </div>
            </div>

            <!-- Card Valores -->
            <div class="col-md-4">
                <div class="mvv-card mvv-card--blue">
                    <div class="mvv-screws">
                        <span class="mvv-screw mvv-screw--tl"></span>
                        <span class="mvv-screw mvv-screw--tr"></span>
                        <span class="mvv-screw mvv-screw--bl"></span>
                        <span class="mvv-screw mvv-screw--br"></span>
                    </div>
                    <div class="mvv-card-inner">
                        <div class="mvv-logo-area">
                            <img src="<?php echo ASSETS_URL; ?>images/logo-genesis.png" alt="Gênesis" class="mvv-logo">
                        </div>
                        <div class="mvv-number">3</div>
                        <h3 class="mvv-title">VALORES</h3>
                        <ul class="mvv-values-list">
                            <li>Respeito.</li>
                            <li>Ética.</li>
                            <li>Compromisso.</li>
                            <li>Valorização do ser humano.</li>
                            <li>Transparência.</li>
                            <li>Afetividade.</li>
                            <li>Cidadania.</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Seção Conheça Nossa História (Video) -->
<section class="school-history py-5">
    <div class="container-lg">
        <div class="text-center mb-5">
            <h2 class="section-title">Conheça a Nossa História</h2>
            <p class="section-subtitle">Assista ao vídeo e descubra como o Colégio Gênesis vem transformando vidas e a educação na região.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="video-wrapper">
                    <div class="video-container shadow-lg rounded overflow-hidden">
                        <video class="w-100" controls poster="<?php echo ASSETS_URL; ?>images/sobreescola.jpg">
                            <source src="<?php echo ASSETS_URL; ?>videos/video_conheca_mais.mp4" type="video/mp4">
                            Seu navegador não suporta a tag de vídeo.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Seção Parceiros -->
<section class="partners-section py-5">
    <div class="container-lg">
        <div class="text-center mb-5">
            <p class="section-label">QUEM CAMINHA COM A GENTE</p>
            <h2 class="section-title">Nossas Parcerias</h2>
            <p class="section-subtitle">Trabalhamos lado a lado com referências nacionais em educação para garantir o melhor conteúdo e metodologia.</p>
        </div>

        <div class="partners-track-wrapper">
            <div class="partners-fade partners-fade--left"></div>
            <div class="partners-fade partners-fade--right"></div>
            <div class="partners-track">
                <!-- Item 1 -->
                <div class="partner-item">
                    <div class="partner-logo-card">
                        <img src="<?php echo ASSETS_URL; ?>images/logo-sistema-etapa.jpg" alt="Sistema Etapa" class="partner-logo-img">
                        <p class="partner-name">Sistema Etapa</p>
                    </div>
                </div>
                <!-- Duplicados para loop infinito -->
                <div class="partner-item">
                    <div class="partner-logo-card partner-logo-card--placeholder">
                        <div class="partner-placeholder-logo">
                            <i class="fas fa-handshake fa-2x"></i>
                        </div>
                        <p class="partner-name">Em breve</p>
                    </div>
                </div>
                <div class="partner-item">
                    <div class="partner-logo-card partner-logo-card--placeholder">
                        <div class="partner-placeholder-logo">
                            <i class="fas fa-handshake fa-2x"></i>
                        </div>
                        <p class="partner-name">Em breve</p>
                    </div>
                </div>
                <!-- Clone para loop -->
                <div class="partner-item" aria-hidden="true">
                    <div class="partner-logo-card">
                        <img src="<?php echo ASSETS_URL; ?>images/logo-sistema-etapa.jpg" alt="Sistema Etapa" class="partner-logo-img">
                        <p class="partner-name">Sistema Etapa</p>
                    </div>
                </div>
                <div class="partner-item" aria-hidden="true">
                    <div class="partner-logo-card partner-logo-card--placeholder">
                        <div class="partner-placeholder-logo">
                            <i class="fas fa-handshake fa-2x"></i>
                        </div>
                        <p class="partner-name">Em breve</p>
                    </div>
                </div>
                <div class="partner-item" aria-hidden="true">
                    <div class="partner-logo-card partner-logo-card--placeholder">
                        <div class="partner-placeholder-logo">
                            <i class="fas fa-handshake fa-2x"></i>
                        </div>
                        <p class="partner-name">Em breve</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


