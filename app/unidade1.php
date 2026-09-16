<?php
/**
 * Página Unidade 1 — Visual profissional
 */
?>

<!-- Hero Interno -->
<div class="inner-hero">
    <div class="container-lg">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-inner mb-3">
                <li class="breadcrumb-item"><a href="?page=home">Início</a></li>
                <li class="breadcrumb-item active">Unidade 1</li>
            </ol>
        </nav>
        <div class="d-flex align-items-center gap-2 mb-2">
            <span class="unit-hero-badge">Unidade 1</span>
        </div>
        <h1 class="inner-hero-title">Maternal e Educação Infantil</h1>
        <p class="inner-hero-subtitle">Um espaço acolhedor e seguro pensado especialmente para os primeiros anos da vida escolar.</p>
    </div>
</div>

<!-- Foto + Descrição -->
<section class="unit-intro-section py-5">
    <div class="container-lg">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="unit-photo-wrapper">
                    <img src="<?php echo ASSETS_URL; ?>images/unidade_1.jpg" alt="Unidade 1 - Maternal e Educação Infantil" class="unit-main-photo img-fluid" loading="lazy">
                    <div class="unit-photo-tag">
                        <i class="fas fa-map-marker-alt me-1"></i>R. Dr. Bráulio Guedes da Silva, 116
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <p class="section-label">QUEM SOMOS</p>
                <h2 class="section-title">Bem-vindo à Unidade 1</h2>
                <p class="unit-intro-text">
                    A Unidade 1 do Colégio Gênesis é dedicada à <strong>Educação Infantil e Maternal</strong>, 
                    oferecendo um ambiente seguro, acolhedor e especialmente projetado para os primeiros anos da vida escolar.
                </p>
                <p class="unit-intro-text">
                    Aqui, os pequenos iniciam sua jornada de descobertas com espaços lúdicos, profissionais especializados 
                    na primeira infância e muito carinho — porque cada etapa importa.
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
            <h2 class="section-title">Diferenciais da Unidade 1</h2>
        </div>
        <div class="row g-4">
            <div class="col-sm-6 col-lg-3">
                <div class="unit-feature-card">
                    <div class="unit-feature-icon"><i class="fas fa-shapes"></i></div>
                    <h5>Maternal e Infantil</h5>
                    <p>Espaços adaptados para o desenvolvimento seguro e lúdico dos pequenos.</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="unit-feature-card">
                    <div class="unit-feature-icon"><i class="fas fa-laptop"></i></div>
                    <h5>Tecnologia</h5>
                    <p>Salas equipadas com recursos tecnológicos voltados para a primeira infância.</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="unit-feature-card">
                    <div class="unit-feature-icon"><i class="fas fa-users"></i></div>
                    <h5>Professores</h5>
                    <p>Equipe altamente qualificada e dedicada ao desenvolvimento integral da criança.</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="unit-feature-card">
                    <div class="unit-feature-icon"><i class="fas fa-shield-heart"></i></div>
                    <h5>Segurança</h5>
                    <p>Ambiente monitorado, com rotinas e estrutura pensadas para a segurança dos alunos.</p>
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
                ['icon' => 'chalkboard-teacher', 'label' => 'Salas de Aula', 'desc' => 'Modernas, climatizadas e com lousa digital'],
                ['icon' => 'flask',              'label' => 'Laboratório',   'desc' => 'Ciências, Informática e Robótica'],
                ['icon' => 'book-open',          'label' => 'Biblioteca',    'desc' => 'Acervo amplo e espaço de estudo'],
                ['icon' => 'futbol',             'label' => 'Quadras',       'desc' => 'Esportes e educação física'],
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
            <h3 class="unit-cta-title">Pronto para conhecer a Unidade 1?</h3>
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
