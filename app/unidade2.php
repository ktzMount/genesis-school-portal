<?php
/**
 * Página Unidade 2 — Visual profissional
 */
?>

<!-- Hero Interno -->
<div class="inner-hero">
    <div class="container-lg">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-inner mb-3">
                <li class="breadcrumb-item"><a href="?page=home">Início</a></li>
                <li class="breadcrumb-item active">Unidade 2</li>
            </ol>
        </nav>
        <div class="d-flex align-items-center gap-2 mb-2">
            <span class="unit-hero-badge unit-hero-badge--2">Unidade 2</span>
        </div>
        <h1 class="inner-hero-title">Ensino Fundamental e Médio</h1>
        <p class="inner-hero-subtitle">Formação sólida, metodologia inovadora e parceria com o Sistema Etapa para preparar você para os melhores resultados.</p>
    </div>
</div>

<!-- Foto + Descrição -->
<section class="unit-intro-section py-5">
    <div class="container-lg">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 order-lg-2">
                <div class="unit-photo-wrapper">
                    <img src="<?php echo ASSETS_URL; ?>images/unidade_2.jpg" alt="Unidade 2 - Ensino Fundamental e Médio" class="unit-main-photo img-fluid" loading="lazy">
                    <div class="unit-photo-tag">
                        <i class="fas fa-map-marker-alt me-1"></i>R. Aparecida, 1470
                    </div>
                </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <p class="section-label">QUEM SOMOS</p>
                <h2 class="section-title">Bem-vindo à Unidade 2</h2>
                <p class="unit-intro-text">
                    A Unidade 2 do Colégio Gênesis é dedicada ao <strong>Ensino Fundamental (I e II) e ao Ensino Médio</strong>, 
                    oferecendo uma formação robusta, crítica e inovadora.
                </p>
                <p class="unit-intro-text">
                    Em parceria com o <strong>Sistema Etapa</strong>, preparamos os alunos para os desafios acadêmicos, 
                    para o desenvolvimento do pensamento crítico e para as melhores universidades do país.
                </p>
                <div class="unit-info-pills mt-4">
                    <span class="unit-info-pill"><i class="fas fa-map-marker-alt me-1"></i>Jd. Santa Rosália</span>
                    <span class="unit-info-pill"><i class="fas fa-clock me-1"></i>7h às 17h30</span>
                    <span class="unit-info-pill"><i class="fas fa-calendar-check me-1"></i>Seg – Sex</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Diferenciais -->
<section class="unit-features-section py-5">
    <div class="container-lg">
        <div class="text-center mb-5">
            <h2 class="section-title">Diferenciais da Unidade 2</h2>
        </div>
        <div class="row g-4">
            <div class="col-sm-6 col-lg-3">
                <div class="unit-feature-card">
                    <div class="unit-feature-icon"><i class="fas fa-user-graduate"></i></div>
                    <h5>Fundamental e Médio</h5>
                    <p>Foco em alta performance, aprovações e preparo para vestibulares.</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="unit-feature-card">
                    <div class="unit-feature-icon"><i class="fas fa-book"></i></div>
                    <h5>Sistema Etapa</h5>
                    <p>Material didático reconhecido nacionalmente, com foco em resultados.</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="unit-feature-card">
                    <div class="unit-feature-icon"><i class="fas fa-palette"></i></div>
                    <h5>Artes e Cultura</h5>
                    <p>Atividades criativas que estimulam o potencial artístico dos alunos.</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="unit-feature-card">
                    <div class="unit-feature-icon"><i class="fas fa-tree"></i></div>
                    <h5>Ambiente Acolhedor</h5>
                    <p>Espaços amplos e aconchegantes que favorecem o aprendizado.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Infraestrutura -->
<section class="unit-infra-section py-5">
    <div class="container-lg">
        <div class="text-center mb-5">
            <h2 class="section-title">Infraestrutura</h2>
        </div>
        <div class="row g-3 justify-content-center">
            <?php
            $infra = [
                ['icon' => 'paint-brush',    'label' => 'Atelier de Artes', 'desc' => 'Espaço dedicado a atividades criativas'],
                ['icon' => 'music',          'label' => 'Sala de Música',   'desc' => 'Instrumentos e ensino musical especializado'],
                ['icon' => 'tree',           'label' => 'Espaço Verde',     'desc' => 'Áreas ao ar livre para aprendizado'],
                ['icon' => 'book-reader',    'label' => 'Sala de Leitura',  'desc' => 'Acervo especializado em literatura'],
            ];
            foreach ($infra as $item): ?>
            <div class="col-md-6 col-lg-3">
                <div class="infra-item">
                    <i class="fas fa-<?php echo $item['icon']; ?> infra-icon"></i>
                    <div>
                        <strong><?php echo $item['label']; ?></strong>
                        <p class="mb-0 text-muted small"><?php echo $item['desc']; ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="unit-cta-section py-5">
    <div class="container-lg">
        <div class="unit-cta-box text-center">
            <h3 class="unit-cta-title">Pronto para conhecer a Unidade 2?</h3>
            <p class="unit-cta-sub">Agende uma visita ou entre em contato com nossa equipe de matrículas.</p>
            <div class="d-flex gap-3 justify-content-center flex-wrap mt-4">
                <a href="?page=enrollment" class="btn btn-orange btn-lg">
                    <i class="fas fa-user-plus me-2"></i>Matricule-se
                </a>
                <a href="?page=home#contato" class="btn btn-outline-orange btn-lg">
                    <i class="fas fa-phone me-2"></i>Fale Conosco
                </a>
            </div>
        </div>
    </div>
</section>
