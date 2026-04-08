<?php
/**
 * Página Sobre a Escola
 */
?>
<div class="container-fluid bg-light py-5">
    <div class="container">
        <h1 class="fw-bold mb-4">Sobre o Colégio Gênesis</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="?page=home">Início</a></li>
                <li class="breadcrumb-item active">Sobre</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="<?php echo ASSETS_URL; ?>images/sobreescola.jpg" alt="Sobre a Escola" class="img-fluid rounded">
            </div>
            <div class="col-md-6">
                <h2 class="fw-bold mb-3">Nossa História</h2>
                <p class="text-muted mb-3">
                    O Colégio Gênesis foi fundado com a missão de proporcionar uma educação de qualidade, 
                    baseada em valores humanitários e na formação integral de seus alunos.
                </p>
                <p class="text-muted mb-3">
                    Com mais de uma década de experiência, nosso colégio consolidou-se como referência 
                    em educação inovadora em Sorocaba, combinando tradição com modernidade.
                </p>
                <p class="text-muted">
                    Nosso compromisso é preparar cidadãos conscientes, críticos e preparados para enfrentar 
                    os desafios do mundo contemporâneo.
                </p>
            </div>
        </div>

        <hr class="my-5">

        <div class="row mb-5">
            <div class="col-md-4 mb-4">
                <div class="text-center">
                    <div class="feature-number text-primary mb-3">
                        <i class="fas fa-users fa-3x"></i>
                    </div>
                    <h4 class="fw-bold">Comunidade</h4>
                    <p class="text-muted">Mais de 800 alunos e 120 profissionais dedicados</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="text-center">
                    <div class="feature-number text-primary mb-3">
                        <i class="fas fa-building fa-3x"></i>
                    </div>
                    <h4 class="fw-bold">Infraestrutura</h4>
                    <p class="text-muted">Instalações modernas e bem equipadas</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="text-center">
                    <div class="feature-number text-primary mb-3">
                        <i class="fas fa-award fa-3x"></i>
                    </div>
                    <h4 class="fw-bold">Reconhecimento</h4>
                    <p class="text-muted">Diversos prêmios e certificações</p>
                </div>
            </div>
        </div>

        <hr class="my-5">

        <div class="row">
            <div class="col-md-6 mb-4">
                <h3 class="fw-bold mb-3">Nossa Missão</h3>
                <p class="text-muted">
                    Proporcionar educação de excelência que desenvolva plenamente o potencial de cada aluno,
                    formando indivíduos éticos, críticos e preparados para contribuir com a sociedade.
                </p>
            </div>
            <div class="col-md-6 mb-4">
                <h3 class="fw-bold mb-3">Nossa Visão</h3>
                <p class="text-muted">
                    Ser reconhecida como instituição de referência em educação inovadora, que forma líderes
                    e cidadãos responsáveis, capazes de transformar o mundo.
                </p>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <h3 class="fw-bold mb-4">Nossos Valores</h3>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="value-item">
                            <h5 class="fw-bold"><i class="fas fa-check-circle text-primary me-2"></i>Excelência</h5>
                            <p class="text-muted ms-4">Busca constante pela qualidade em tudo que fazemos</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="value-item">
                            <h5 class="fw-bold"><i class="fas fa-check-circle text-primary me-2"></i>Integridade</h5>
                            <p class="text-muted ms-4">Honestidade e transparência em nossas ações</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="value-item">
                            <h5 class="fw-bold"><i class="fas fa-check-circle text-primary me-2"></i>Inovação</h5>
                            <p class="text-muted ms-4">Adoção de metodologias modernas e criativas</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="value-item">
                            <h5 class="fw-bold"><i class="fas fa-check-circle text-primary me-2"></i>Respeito</h5>
                            <p class="text-muted ms-4">Valorização da diversidade e dignidade humana</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="fw-bold mb-3">Conheça Seus Professores</h2>
        <p class="lead text-muted mb-4">Equipe qualificada e dedicada ao seu desenvolvimento</p>
        <a href="?page=tour" class="btn btn-primary btn-lg">Conhecer a Equipe</a>
    </div>
</section>
