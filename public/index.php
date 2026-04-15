<?php
/**
 * Ponto de Entrada Principal da Aplicação
 * genesis-school-portal/public/index.php
 */

// Carregar configurações
require_once __DIR__ . '/../config/config.php';

// Determinar página (sanitizada e validada pela lista de páginas em config)
$page = $_GET['page'] ?? 'home';
$page = preg_replace('/[^a-z0-9_\-]/i', '', $page);
if (!isset($pages[$page])) {
    $page = 'home';
}

// Incluir header (usa as funções de config para título/descrição)
include(INCLUDES_PATH . 'header.php');

// Incluir conteúdo da página
$page_file = APP_PATH . $page . '.php';
if (is_file($page_file) && file_exists($page_file)) {
    include($page_file);
} else {
    http_response_code(404);
    echo '<div class="container mt-5">\n'
       . '  <div class="alert alert-danger" role="alert">\n'
       . '    <h4 class="alert-heading">Página não encontrada</h4>\n'
       . '    <p>Desculpe, a página solicitada não existe.</p>\n'
       . '    <a href="?page=home" class="btn btn-primary">Voltar ao Início</a>\n'
       . '  </div>\n'
       . '</div>';
}

// Incluir footer
include(INCLUDES_PATH . 'footer.php');
?>
