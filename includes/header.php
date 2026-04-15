<?php
/**
 * Header - Incluído em todas as páginas
 */
$currentPage = $page ?? ($_GET['page'] ?? 'home');
$title = get_page_title($currentPage);
$description = get_page_description($currentPage);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo htmlspecialchars($description); ?>">
    <meta name="keywords" content="escola, educação, matrícula, eventos, colégio gênesis">
    <meta name="author" content="Colégio Gênesis">
    
    <title><?php echo htmlspecialchars($title); ?></title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- CSS Customizado -->
    <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>css/style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-lg">
                <a class="navbar-brand fw-bold" href="<?php echo BASE_URL; ?>">
                    <img src="<?php echo ASSETS_URL; ?>images/logo-genesis.png" alt="Colégio Gênesis" height="50" class="me-2">
                    <span class="brand-text">Colégio Gênesis</span>
                </a>

                <!-- Offcanvas (hambúrguer) trigger usando a logo como ícone -->
                <button class="btn btn-link hamburger-trigger p-0 me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu" aria-label="Abrir menu">
                    <img src="<?php echo ASSETS_URL; ?>images/logo-genesis.png" alt="Menu" class="hamburger-logo">
                </button>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="#navbarNav" aria-expanded="false" aria-label="Alternar navegação">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo is_active_page('home'); ?>" href="<?php echo BASE_URL; ?>?page=home">
                            Início
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo is_active_page('about'); ?>" href="<?php echo BASE_URL; ?>?page=about">
                            Sobre
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo is_active_page('enrollment'); ?>" href="<?php echo BASE_URL; ?>?page=enrollment">
                            Matrícula
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo is_active_page('events'); ?>" href="<?php echo BASE_URL; ?>?page=events">
                            Eventos
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Offcanvas Menu -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasMenuLabel">Menu</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Fechar"></button>
        </div>
        <div class="offcanvas-body">
            <nav class="nav flex-column">
                <a class="nav-link" href="<?php echo BASE_URL; ?>?page=home" data-bs-dismiss="offcanvas">Início</a>
                <a class="nav-link" href="<?php echo BASE_URL; ?>?page=about" data-bs-dismiss="offcanvas">Sobre Nós</a>
                <a class="nav-link" href="<?php echo BASE_URL; ?>?page=about#equipe" data-bs-dismiss="offcanvas">Conheça a Equipe</a>
                <a class="nav-link" href="<?php echo BASE_URL; ?>?page=enrollment" data-bs-dismiss="offcanvas">Matrícula</a>
                <a class="nav-link" href="<?php echo BASE_URL; ?>?page=news" data-bs-dismiss="offcanvas">Avisos</a>
                <a class="nav-link" href="<?php echo BASE_URL; ?>?page=events" data-bs-dismiss="offcanvas">Eventos</a>
                <a class="nav-link" href="<?php echo BASE_URL; ?>?page=tour" data-bs-dismiss="offcanvas">Tour 360°</a>
                <a class="nav-link" href="<?php echo BASE_URL; ?>?page=home#contato" data-bs-dismiss="offcanvas">Fale Conosco</a>
            </nav>
        </div>
    </div>

