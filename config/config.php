<?php
/**
 * Configuração Global da Aplicação
 * Genesis School Portal - Site Vitrine
 */

// Configuração de URLs (detecta protocolo e sanitiza host)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || ($_SERVER['SERVER_PORT'] ?? 0) == 443 ? 'https://' : 'http://';
$host = isset($_SERVER['HTTP_HOST']) ? preg_replace('/[^A-Za-z0-9.:-]/', '', $_SERVER['HTTP_HOST']) : 'localhost';
// Ajuste o sufixo abaixo caso a aplicação esteja em outro subdiretório
define('BASE_URL', $protocol . $host . '/tcc_setembro/');
define('ASSETS_URL', rtrim(BASE_URL, '/') . '/assets/');

// Configuração de Diretórios
define('ROOT_PATH', dirname(dirname(__FILE__)));
define('ASSETS_PATH', ROOT_PATH . '/assets/');
define('APP_PATH', ROOT_PATH . '/app/');
define('INCLUDES_PATH', ROOT_PATH . '/includes/');
define('PUBLIC_PATH', ROOT_PATH . '/');

// Configuração de Banco de Dados
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'genesis_school');

// Habilitar/Desabilitar Modo de Desenvolvimento
define('DEBUG_MODE', true);

// Conexão PDO com Banco de Dados
try {
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
    ];
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", DB_USER, DB_PASS, $options);
} catch (PDOException $e) {
    if (DEBUG_MODE) {
        die("Erro de Conexão PDO: " . $e->getMessage());
    } else {
        die("Erro ao conectar ao banco de dados. Tente novamente mais tarde.");
    }
}

// Buscar configurações globais do banco de dados
$site_settings = [];
try {
    $stmt = $pdo->query("SELECT config_key, config_value FROM settings");
    if ($stmt) {
        while ($row = $stmt->fetch()) {
            $site_settings[$row['config_key']] = $row['config_value'];
        }
    }
} catch (Exception $e) {
    // Tabela pode não existir ainda no primeiro acesso
}

// Configurações Gerais do Colégio (Prioriza Banco de Dados)
define('SCHOOL_NAME',    $site_settings['school_name']    ?? 'Colégio Gênesis');
define('SCHOOL_PHONE',   $site_settings['school_phone']   ?? '(11) 4002-8922');
define('SCHOOL_EMAIL',   $site_settings['school_email']   ?? 'contato@colegiogenesis.com.br');
define('SCHOOL_ADDRESS', $site_settings['school_address'] ?? 'Sorocaba - SP (Jd. Santa Rosália)');
define('SCHOOL_MAPS',    $site_settings['school_maps']    ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.1975!2d-46.65!3d-23.56!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjPCsDMzJzM2LjAiUyA0NsKwMzknMDAuMCJX!5e0!3m2!1spt-BR!2sbr!4v1620000000000');

// Configuração de Páginas
$pages = [
    'home' => [
        'title' => 'Início | Genesis School',
        'description' => 'Bem-vindo à Genesis School - Qualidade em Educação'
    ],
    'unidade1' => [
        'title' => 'Unidade 1 | Genesis School',
        'description' => 'Conheça a Unidade 1 do Colégio Gênesis'
    ],
    'unidade2' => [
        'title' => 'Unidade 2 | Genesis School',
        'description' => 'Conheça a Unidade 2 do Colégio Gênesis'
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
    ],
    'contact' => [
        'title' => 'Contato | Genesis School',
        'description' => 'Fale conosco e agende uma visita'
    ],
    'event-details' => [
        'title' => 'Detalhes do Evento | Genesis School',
        'description' => 'Acompanhe os detalhes deste evento'
    ],
    'news-details' => [
        'title' => 'Detalhes do Aviso | Genesis School',
        'description' => 'Leia mais sobre este comunicado'
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
