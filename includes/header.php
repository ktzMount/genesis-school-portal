<?php
/**
 * Header - Incluído em todas as páginas
 */
$page = $_GET['page'] ?? 'home';
$title = get_page_title($page);
$description = get_page_description($page);
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
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
                            Atividades
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo is_active_page('events'); ?>" href="<?php echo BASE_URL; ?>?page=events">
                            Contato
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>
