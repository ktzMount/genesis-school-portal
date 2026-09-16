<?php
session_start();
require_once __DIR__ . '/../config/config.php';

if (!isset($_SESSION['gestao_logado']) || $_SESSION['gestao_logado'] !== true) {
    header('Location: login.php');
    exit;
}

$msg = '';

// Garantir que a tabela existe (fallback caso o script de setup falhe)
$pdo->exec("CREATE TABLE IF NOT EXISTS settings (
    config_key VARCHAR(50) PRIMARY KEY,
    config_value TEXT,
    label VARCHAR(100)
)");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST['settings'] as $key => $value) {
        $stmt = $pdo->prepare("INSERT INTO settings (config_key, config_value) VALUES (?, ?) ON DUPLICATE KEY UPDATE config_value = ?");
        $stmt->execute([$key, $value, $value]);
    }
    $msg = "Configurações atualizadas com sucesso!";
}

// Buscar todas as configurações
$stmt = $pdo->query("SELECT * FROM settings");
$settings = $stmt->fetchAll();

// Se a tabela estiver vazia, popular com os padrões
if (empty($settings)) {
    $defaults = [
        ['school_name', SCHOOL_NAME, 'Nome da Escola'],
        ['school_phone', SCHOOL_PHONE, 'Telefone de Contato'],
        ['school_email', SCHOOL_EMAIL, 'E-mail de Contato'],
        ['school_address', SCHOOL_ADDRESS, 'Endereço da Escola'],
        ['school_maps', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.1975!2d-46.65!3d-23.56!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjPCsDMzJzM2LjAiUyA0NsKwMzknMDAuMCJX!5e0!3m2!1spt-BR!2sbr!4v1620000000000', 'Link Google Maps (Embed)']
    ];
    $ins = $pdo->prepare("INSERT IGNORE INTO settings (config_key, config_value, label) VALUES (?, ?, ?)");
    foreach ($defaults as $d) { $ins->execute($d); }
    $settings = $pdo->query("SELECT * FROM settings")->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações | Painel de Gestão</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/assets/css/admin.css">
</head>
<body>

<div class="admin-wrapper">
    <aside class="sidebar">
        <div class="sidebar-header">
            <h4 class="mb-0 fw-bold">GÊNESIS</h4>
            <small class="opacity-75">Sistema de Gestão</small>
        </div>
        <nav class="sidebar-menu">
            <a href="painel.php"><i class="fas fa-th-large"></i> Dashboard</a>
            <a href="gerenciar_eventos.php"><i class="fas fa-calendar-alt"></i> Eventos</a>
            <a href="gerenciar_avisos.php"><i class="fas fa-bullhorn"></i> Avisos</a>
            <a href="gerenciar_matriculas.php"><i class="fas fa-file-signature"></i> Matrículas</a>
            <a href="configuracoes.php" class="active"><i class="fas fa-cog"></i> Configurações</a>
            <hr class="mx-3 opacity-25">
            <a href="../public/index.php" target="_blank"><i class="fas fa-external-link-alt"></i> Ver Site</a>
            <a href="logout.php" class="text-danger"><i class="fas fa-sign-out-alt"></i> Sair</a>
        </nav>
    </aside>

    <main class="main-content">
        <div class="top-nav mb-4 rounded shadow-sm">
            <div class="user-profile">
                <span class="fw-600 text-muted">Olá, <strong><?php echo htmlspecialchars($_SESSION['gestao_usuario']); ?></strong></span>
                <img src="https://ui-avatars.com/api/?name=<?php echo $_SESSION['gestao_usuario']; ?>&background=0d4fa8&color=fff" alt="User" class="rounded-circle" width="35">
            </div>
        </div>

        <div class="page-header">
            <h2>Configurações do Sistema</h2>
            <p class="text-muted">Ajuste os dados principais da instituição que aparecem em todo o site.</p>
        </div>

        <?php if ($msg): ?>
            <div class="alert alert-success border-0 shadow-sm"><i class="fas fa-check-circle me-2"></i> <?php echo $msg; ?></div>
        <?php endif; ?>

        <div class="row">
            <div class="col-lg-8">
                <div class="admin-card">
                    <form method="POST">
                        <?php foreach ($settings as $s): ?>
                        <div class="mb-4">
                            <label class="form-label fw-bold"><?php echo htmlspecialchars($s['label']); ?></label>
                            <?php if ($s['config_key'] === 'school_address' || $s['config_key'] === 'school_maps'): ?>
                                <textarea name="settings[<?php echo $s['config_key']; ?>]" class="form-control" rows="2"><?php echo htmlspecialchars($s['config_value']); ?></textarea>
                            <?php else: ?>
                                <input type="text" name="settings[<?php echo $s['config_key']; ?>]" class="form-control" value="<?php echo htmlspecialchars($s['config_value']); ?>">
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>
                        
                        <div class="mt-4 pt-3 border-top">
                            <button type="submit" class="btn btn-admin btn-admin-primary px-5">Salvar Todas as Alterações</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="admin-card bg-light border-0">
                    <h5>Dica Profissional</h5>
                    <p class="small text-muted">Estas informações são globais. Ao alterar o telefone aqui, ele será atualizado automaticamente no Rodapé, na página de Contato e em todos os outros lugares do site.</p>
                    <hr>
                    <h6>Segurança</h6>
                    <p class="small text-muted mb-0">O sistema utiliza criptografia SSL para proteger os dados enviados por este formulário.</p>
                </div>
            </div>
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
