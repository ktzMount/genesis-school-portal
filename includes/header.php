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
    <nav class="navbar navbar-expand-lg glass-nav fixed-top transition-all">
        <div class="container-lg">
                <a class="navbar-brand fw-bold" href="<?php echo BASE_URL; ?>">
                    <img src="<?php echo ASSETS_URL; ?>images/logo-genesis.png" alt="Colégio Gênesis" height="50" class="me-2 logo-hover-effect">
                    <span class="brand-text">Colégio Gênesis</span>
                </a>

                <!-- Desktop Navigation (Abas) -->
                <div class="collapse navbar-collapse d-none d-lg-block mx-4" id="desktopNav">
                    <ul class="navbar-nav mb-2 mb-lg-0 w-100 justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link nav-aba <?php echo $currentPage == 'home' ? 'active' : ''; ?>" href="<?php echo BASE_URL; ?>?page=home">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-aba <?php echo $currentPage == 'unidade1' ? 'active' : ''; ?>" href="<?php echo BASE_URL; ?>?page=unidade1">Unidade 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-aba <?php echo $currentPage == 'unidade2' ? 'active' : ''; ?>" href="<?php echo BASE_URL; ?>?page=unidade2">Unidade 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-aba <?php echo $currentPage == 'events' ? 'active' : ''; ?>" href="<?php echo BASE_URL; ?>?page=events">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-aba <?php echo $currentPage == 'news' ? 'active' : ''; ?>" href="<?php echo BASE_URL; ?>?page=news">Avisos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-aba <?php echo $currentPage == 'tour' ? 'active' : ''; ?>" href="<?php echo BASE_URL; ?>?page=tour">Tour 360°</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-aba <?php echo $currentPage == 'contact' ? 'active' : ''; ?>" href="<?php echo BASE_URL; ?>?page=contact">Contato</a>
                        </li>
                    </ul>
                </div>

                <div class="ms-auto d-flex align-items-center gap-3">
                    <!-- Botão de Matrícula -->
                    <a href="<?php echo BASE_URL; ?>?page=enrollment" class="btn btn-premium d-none d-sm-inline-flex align-items-center">
                        <i class="fas fa-user-plus me-2"></i>Matricule-se
                    </a>

                    <!-- Menu Hambúrguer (Mobile) -->
                    <button class="btn btn-link p-0 d-lg-none menu-toggle-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu" aria-label="Abrir menu">
                        <div class="hamburger-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>
                </div>
        </div>
    </nav>

    <!-- Offcanvas Menu -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasMenuLabel">Menu</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Fechar"></button>
        </div>
        <div class="offcanvas-body">
            <nav class="nav flex-column">
                <a class="nav-link" href="<?php echo BASE_URL; ?>?page=home" data-bs-dismiss="offcanvas">Início</a>
                <a class="nav-link" href="<?php echo BASE_URL; ?>?page=unidade1" data-bs-dismiss="offcanvas">Unidade 1</a>
                <a class="nav-link" href="<?php echo BASE_URL; ?>?page=unidade2" data-bs-dismiss="offcanvas">Unidade 2</a>
                <a class="nav-link" href="<?php echo BASE_URL; ?>?page=enrollment" data-bs-dismiss="offcanvas">Matrícula</a>
                <a class="nav-link" href="<?php echo BASE_URL; ?>?page=events" data-bs-dismiss="offcanvas">Eventos</a>
                <a class="nav-link" href="<?php echo BASE_URL; ?>?page=news" data-bs-dismiss="offcanvas">Avisos</a>
                <a class="nav-link" href="<?php echo BASE_URL; ?>?page=tour" data-bs-dismiss="offcanvas">Tour 360°</a>
                <a class="nav-link" href="<?php echo BASE_URL; ?>?page=contact" data-bs-dismiss="offcanvas">Fale Conosco</a>
            </nav>
        </div>
    </div>

