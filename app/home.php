<?php
/**
 * Página Home
 */
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
                <h1 class="hero-title">Formando cidadãos para o <span class="highlight">futuro</span></h1>
                <p class="hero-subtitle">O Colégio Gênesis oferece ensino de qualidade com foco no desenvolvimento integral do aluno, combinando tradição pedagógica e inovação.</p>
                <div class="hero-buttons mt-4">
                    <a href="?page=enrollment" class="btn btn-orange btn-lg me-3">
                        <i class="fas fa-user-plus me-2"></i>Matricule-se
                    </a>
                    <a href="?page=about" class="btn btn-outline-orange btn-lg">
                        Conheça a Escola
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

<!-- Seção Por Que Nos Escolher -->
<section class="why-choose">
    <div class="container-lg">
        <div class="text-center mb-4">
            <p class="section-label">POR QUE NOS ESCOLHER</p>
            <h2 class="section-title">Educação que transforma vidas</h2>
            <p class="section-subtitle">Há mais de uma década, o Colégio Gênesis é referência em educação em Sorocaba, formando alunos protagonistas e preparados.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="icon-box">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <h4>Ensino de Qualidade</h4>
                    <p>Metodologia moderna aliada à tradição pedagógica, preparando alunos para os desafios do futuro.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="icon-box">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h4>Valores Humanos</h4>
                    <p>Formação integral que valoriza o respeito, a ética e o desenvolvimento socioemocional.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="icon-box">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h4>Atividades Extracurriculares</h4>
                    <p>Esportes, artes e cultura que complementam o aprendizado e estimulam talentos.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Seção Vida Escolar -->
<section class="school-life">
    <div class="container-lg">
        <div class="text-center mb-4">
            <p class="section-label">VIDA ESCOLAR</p>
            <h2 class="section-title">Muito além da sala de aula</h2>
        </div>

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="activity-card">
                    <img src="<?php echo ASSETS_URL; ?>images/atividade-judo.jpg" alt="Artes Marciais" class="activity-img" loading="lazy">
                    <div class="activity-overlay">
                        <h5>Artes Marciais</h5>
                        <p>Judô e outras modalidades que desenvolvem disciplina e respeito.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="activity-card">
                    <img src="<?php echo ASSETS_URL; ?>images/festa-encerramento.jpg" alt="Eventos Culturais" class="activity-img" loading="lazy">
                    <div class="activity-overlay">
                        <h5>Eventos Culturais</h5>
                        <p>Festas e apresentações que celebram a comunidade escolar.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="activity-card">
                    <img src="<?php echo ASSETS_URL; ?>images/folia-carnaval.jpg" alt="Datas Comemorativas" class="activity-img" loading="lazy">
                    <div class="activity-overlay">
                        <h5>Datas Comemorativas</h5>
                        <p>Celebrações que enriquecem o aprendizado e criam memórias.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Seção CTA Contato -->
<section id="contato" class="contact-cta">
    <div class="container-lg">
        <div class="text-center mb-4">
            <p class="section-label">FALE CONOSCO</p>
            <h2 class="section-title">Entre em contato</h2>
            <p class="section-subtitle">Quer saber mais sobre o Colégio Gênesis? Agende uma visita ou tire suas dúvidas. Estamos prontos para receber sua família.</p>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="contact-info">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h6>Endereço</h6>
                            <p><?php echo SCHOOL_ADDRESS; ?></p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>
                            <h6>Telefone</h6>
                            <p><?php echo SCHOOL_PHONE; ?></p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h6>E-mail</h6>
                            <p><?php echo SCHOOL_EMAIL; ?></p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <h6>Horário</h6>
                            <p>Seg-Sex, 7h às 18h</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <form id="contactForm" class="contact-form">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control form-input" id="name" name="name" placeholder="Seu nome completo" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control form-input" id="email" name="email" placeholder="seu@email.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Mensagem</label>
                        <textarea class="form-control form-input" id="message" name="message" rows="3" placeholder="Como podemos ajudar?" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark w-100 btn-submit">Enviar Mensagem</button>
                </form>
            </div>
        </div>
    </div>
</section>
