<?php
/**
 * Footer - Incluído em todas as páginas
 */
?>
    <!-- Footer -->
    <footer class="py-5">
        <div class="container-lg">
            <div class="row g-4">
                <!-- Coluna 1: Logo e descrição -->
                <div class="col-md-4">
                    <div class="d-flex align-items-center mb-3">
                        <img src="<?php echo ASSETS_URL; ?>images/logo-genesis.png" alt="Colégio Gênesis" height="44" class="me-2">
                        <span class="fw-bold fs-5" style="color:#fff;">Colégio Gênesis</span>
                    </div>
                    <p class="footer-desc">
                        Proporcionando educação de qualidade e formando cidadãos preparados para o futuro em Sorocaba, SP.
                    </p>
                    <!-- Redes Sociais -->
                    <div class="footer-socials mt-3">
                        <a href="#" aria-label="Facebook" class="footer-social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Instagram" class="footer-social-link"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

                <!-- Coluna 2: Links rápidos -->
                <div class="col-md-4">
                    <h5 class="footer-heading">Links Rápidos</h5>
                    <ul class="list-unstyled footer-links">
                        <li><a href="<?php echo BASE_URL; ?>?page=home">Início</a></li>
                        <li><a href="<?php echo BASE_URL; ?>?page=unidade1">Unidade 1</a></li>
                        <li><a href="<?php echo BASE_URL; ?>?page=unidade2">Unidade 2</a></li>
                        <li><a href="<?php echo BASE_URL; ?>?page=events">Eventos</a></li>
                        <li><a href="<?php echo BASE_URL; ?>?page=news">Avisos</a></li>
                        <li><a href="<?php echo BASE_URL; ?>?page=enrollment">Matrícula</a></li>
                        <li><a href="<?php echo BASE_URL; ?>?page=tour">Tour 360°</a></li>
                        <li><a href="<?php echo BASE_URL; ?>?page=contact">Fale Conosco</a></li>
                    </ul>
                </div>

                <!-- Coluna 3: Contato -->
                <div class="col-md-4">
                    <h5 class="footer-heading">Contato</h5>
                    <ul class="list-unstyled footer-contact">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <strong>Unidade 1:</strong> R. Dr. Bráulio Guedes da Silva, 116<br>
                                <strong>Unidade 2:</strong> R. Aparecida, 1470<br>
                                <span class="text-white-50">Jardim Santa Rosália, Sorocaba - SP</span>
                            </div>
                        </li>
                        <li>
                            <i class="fas fa-phone"></i>
                            <span><?php echo SCHOOL_PHONE; ?></span>
                        </li>
                        <li>
                            <i class="fab fa-whatsapp" style="color:#25d366;"></i>
                            <a href="https://wa.me/5515000000000" target="_blank" class="footer-whatsapp">WhatsApp — em breve</a>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <span><?php echo SCHOOL_EMAIL; ?></span>
                        </li>
                        <li>
                            <i class="fas fa-clock"></i>
                            <span>Seg–Sex, 7h às 18h</span>
                        </li>
                    </ul>
                </div>
            </div>

            <hr class="footer-divider my-4">

            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0 text-white-50 small">&copy; <?php echo date('Y'); ?> Colégio Gênesis. Todos os direitos reservados.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0 text-white-50 small">Jardim Santa Rosália, Sorocaba — SP</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- JS Customizado -->
    <script src="<?php echo ASSETS_URL; ?>js/script.js"></script>
</body>
</html>
