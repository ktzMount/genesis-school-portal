<?php
/**
 * Página de Contato
 */
?>

<!-- Hero Interno -->
<div class="inner-hero">
    <div class="container-lg">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-inner mb-3">
                <li class="breadcrumb-item"><a href="?page=home">Início</a></li>
                <li class="breadcrumb-item active">Contato</li>
            </ol>
        </nav>
        <h1 class="inner-hero-title"><i class="fas fa-envelope-open-text me-2"></i>Fale Conosco</h1>
        <p class="inner-hero-subtitle">Quer saber mais sobre o Colégio Gênesis? Agende uma visita ou tire suas dúvidas. Estamos prontos para receber sua família.</p>
    </div>
</div>

<section class="contact-cta py-5">
    <div class="container-lg">
        <div class="row g-5">
            <!-- Informações de Contato -->
            <div class="col-lg-5">
                <div class="contact-info-box">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h6>Nossas Unidades</h6>
                            <p class="mb-1"><strong>Unidade 1:</strong> R. Dr. Bráulio Guedes da Silva, 116 - Jd. Santa Rosália</p>
                            <p><strong>Unidade 2:</strong> R. Aparecida, 1470 - Jd. Santa Rosália</p>
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
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <div>
                            <h6>WhatsApp</h6>
                            <p><a href="https://wa.me/5515000000000" target="_blank" class="whatsapp-link">Chamar no WhatsApp <i class="fas fa-external-link-alt ms-1 small"></i></a></p>
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
                            <h6>Horário de Atendimento</h6>
                            <p>Segunda a Sexta, 7h às 18h</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulário -->
            <div class="col-lg-7">
                <form id="contactForm" class="contact-form">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="name" class="form-label">Nome completo</label>
                            <input type="text" class="form-control form-input" id="name" name="name" placeholder="Seu nome" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="phone" class="form-label">Telefone / WhatsApp</label>
                            <input type="tel" class="form-control form-input" id="phone" name="phone" placeholder="(15) 99999-9999">
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control form-input" id="email" name="email" placeholder="seu@email.com" required>
                        </div>
                        <div class="col-12">
                            <label for="subject" class="form-label">Assunto</label>
                            <select class="form-select form-input" id="subject" name="subject">
                                <option value="">Selecione um assunto…</option>
                                <option value="matricula">Matrícula</option>
                                <option value="visita">Agendar Visita</option>
                                <option value="duvidas">Dúvidas Gerais</option>
                                <option value="outro">Outro</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="message" class="form-label">Mensagem</label>
                            <textarea class="form-control form-input" id="message" name="message" rows="5" placeholder="Como podemos ajudar?" required></textarea>
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-submit w-100 py-3">
                                <i class="fas fa-paper-plane me-2"></i>Enviar Mensagem
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
