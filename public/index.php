<?php
/**
 * Ponto de Entrada Principal da Aplicação
 * genesis-school-portal/public/index.php
 */

// Carregar configurações
require_once('../config/config.php');

// Incluir header
include(INCLUDES_PATH . 'header.php');

// Determinar página
$page = $_GET['page'] ?? 'home';

// Validar página e incluir arquivo correspondente
$page_file = APP_PATH . $page . '.php';

if (file_exists($page_file)) {
    include($page_file);
} else {
    echo '<div class="container mt-5">
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Página não encontrada</h4>
                <p>Desculpe, a página solicitada não existe.</p>
                <a href="?page=home" class="btn btn-primary">Voltar ao Início</a>
            </div>
          </div>';
}

// Incluir footer
include(INCLUDES_PATH . 'footer.php');
?>
