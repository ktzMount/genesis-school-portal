<?php
/**
 * Footer - Incluído em todas as páginas
 */
?>
    <!-- Footer -->
    <footer class="py-5">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="fw-bold mb-3">
                        <img src="<?php echo ASSETS_URL; ?>images/logo-genesis.png" alt="Colégio Gênesis" height="40" class="me-2">
                        Colégio Gênesis
                    </h5>
                    <p class="">
                        Proporcionando educação de qualidade e formando cidadãos preparados para o futuro.
                    </p>
                </div>
                
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="fw-bold mb-3">Links Rápidos</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="<?php echo BASE_URL; ?>?page=home">Início</a></li>
                        <li class="mb-2"><a href="<?php echo BASE_URL; ?>?page=about">Sobre Nós</a></li>
                        <li class="mb-2"><a href="<?php echo BASE_URL; ?>?page=enrollment">Matrícula</a></li>
                        <li><a href="<?php echo BASE_URL; ?>?page=events">Eventos</a></li>
                    </ul>
                </div>
                
                <div class="col-md-4">
                    <h5 class="fw-bold mb-3">Contato</h5>
                    <p class="mb-2">
                        <i class="fas fa-phone"></i> <?php echo SCHOOL_PHONE; ?>
                    </p>
                    <p class="mb-2">
                        <i class="fas fa-envelope"></i> <?php echo SCHOOL_EMAIL; ?>
                    </p>
                    <p class="mb-3">
                        <i class="fas fa-map-marker-alt"></i> <?php echo SCHOOL_ADDRESS; ?>
                    </p>
                    
                    <!-- Social Media -->
                    <div class="mt-3">
                        <a href="#" class="me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            
            <hr class="my-4">
            
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0">&copy; 2024 Colégio Gênesis. Todos os direitos reservados.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="#" class="text-decoration-none me-3">Política de Privacidade</a>
                    <a href="#" class="text-decoration-none">Termos de Uso</a>
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
