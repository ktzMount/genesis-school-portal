<?php
/**
 * Configuração Global da Aplicação
 * Genesis School Portal - Site Vitrine
 */

// Informações da Escola
define('SCHOOL_NAME', 'Colégio Gênesis');
define('SCHOOL_PHONE', '(15) 0000-0000');
define('SCHOOL_EMAIL', 'contato@colegiogenesis.com.br');
define('SCHOOL_ADDRESS', 'Sorocaba, SP');

// Configuração de URLs (detecta protocolo e sanitiza host)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || ($_SERVER['SERVER_PORT'] ?? 0) == 443 ? 'https://' : 'http://';
$host = isset($_SERVER['HTTP_HOST']) ? preg_replace('/[^A-Za-z0-9.:-]/', '', $_SERVER['HTTP_HOST']) : 'localhost';
// Ajuste o sufixo abaixo caso a aplicação esteja em outro subdiretório
define('BASE_URL', $protocol . $host . '/genesis-school-portal/public/');
define('ASSETS_URL', rtrim(BASE_URL, '/') . '/assets/');

// Configuração de Diretórios
define('ROOT_PATH', dirname(dirname(__FILE__)));
define('APP_PATH', ROOT_PATH . '/app/');
define('INCLUDES_PATH', ROOT_PATH . '/includes/');
define('PUBLIC_PATH', ROOT_PATH . '/public/');

// Configuração de Banco de Dados (opcional para futuro)
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'genesis_school');

// Habilitar/Desabilitar Modo de Desenvolvimento
define('DEBUG_MODE', true);

// Configuração de Páginas
$pages = [
    'home' => [
        'title' => 'Início | Genesis School',
        'description' => 'Bem-vindo à Genesis School - Qualidade em Educação'
    ],
    'about' => [
        'title' => 'Sobre Nós | Genesis School',
        'description' => 'Conheça a história e missão da Genesis School'
    ],
    'enrollment' => [
        'title' => 'Matrícula | Genesis School',
        'description' => 'Informações sobre processo de matrícula'
    ],
    'news' => [
        'title' => 'Avisos | Genesis School',
        'description' => 'Acompanhe os últimos avisos e comunicados'
    ],
    'events' => [
        'title' => 'Eventos | Genesis School',
        'description' => 'Conheça nossos próximos eventos'
    ],
    'tour' => [
        'title' => 'Tour 360° | Genesis School',
        'description' => 'Visite virtualmente nossas instalações'
    ]
];

// Funções de Utilidade
function get_page_title($page = 'home') {
    global $pages;
    return isset($pages[$page]) ? $pages[$page]['title'] : 'Genesis School';
}

function get_page_description($page = 'home') {
    global $pages;
    return isset($pages[$page]) ? $pages[$page]['description'] : 'Qualidade em Educação';
}

function is_active_page($page) {
    $current = $_GET['page'] ?? 'home';
    return $current === $page ? 'active' : '';
}
?>
