<?php
session_start();
require_once __DIR__ . '/../config/config.php';

// Verificar autenticação
if (!isset($_SESSION['gestao_logado']) || $_SESSION['gestao_logado'] !== true) {
    header('Location: login.php');
    exit;
}

// Verificar expiração da sessão (30 minutos)
if (isset($_SESSION['gestao_tempo']) && (time() - $_SESSION['gestao_tempo'] > 1800)) {
    session_unset();
    session_destroy();
    header('Location: login.php?timeout=1');
    exit;
}
$_SESSION['gestao_tempo'] = time();

// Buscar estatísticas básicas
$totalEvents = $pdo->query("SELECT COUNT(*) FROM events")->fetchColumn();
$totalNews = $pdo->query("SELECT COUNT(*) FROM news")->fetchColumn();
$totalSteps = $pdo->query("SELECT COUNT(*) FROM enrollment_steps")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Gestão | Colégio Gênesis</title>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <!-- Admin CSS -->
    <link rel="stylesheet" href="../public/assets/css/admin.css">
</head>
<body>

<div class="admin-wrapper">
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <h4 class="mb-0 fw-bold">GÊNESIS</h4>
            <small class="opacity-75">Sistema de Gestão</small>
        </div>
        <nav class="sidebar-menu">
            <a href="painel.php" class="active"><i class="fas fa-th-large"></i> Dashboard</a>
            <a href="gerenciar_eventos.php"><i class="fas fa-calendar-alt"></i> Eventos</a>
            <a href="gerenciar_avisos.php"><i class="fas fa-bullhorn"></i> Avisos</a>
            <a href="gerenciar_matriculas.php"><i class="fas fa-file-signature"></i> Matrículas</a>
            <hr class="mx-3 opacity-25">
            <a href="../public/index.php" target="_blank"><i class="fas fa-external-link-alt"></i> Ver Site</a>
            <a href="logout.php" class="text-danger"><i class="fas fa-sign-out-alt"></i> Sair</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Top Nav -->
        <div class="top-nav mb-4 rounded shadow-sm">
            <div class="user-profile">
                <span class="fw-600 text-muted">Olá, <strong><?php echo htmlspecialchars($_SESSION['gestao_usuario']); ?></strong></span>
                <img src="https://ui-avatars.com/api/?name=<?php echo $_SESSION['gestao_usuario']; ?>&background=0d4fa8&color=fff" alt="User" class="rounded-circle" width="35">
            </div>
        </div>

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Dashboard</h2>
                    <p class="text-muted">Bem-vindo ao painel de controle do Colégio Gênesis.</p>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="admin-card border-start border-4 border-primary">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1 text-uppercase small fw-bold">Eventos</h6>
                            <h2 class="mb-0 fw-bold"><?php echo $totalEvents; ?></h2>
                        </div>
                        <div class="card-icon bg-light-blue mb-0">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="admin-card border-start border-4 border-warning">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1 text-uppercase small fw-bold">Avisos</h6>
                            <h2 class="mb-0 fw-bold"><?php echo $totalNews; ?></h2>
                        </div>
                        <div class="card-icon bg-light-yellow mb-0">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="admin-card border-start border-4 border-success">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1 text-uppercase small fw-bold">Etapas Matrícula</h6>
                            <h2 class="mb-0 fw-bold"><?php echo $totalSteps; ?></h2>
                        </div>
                        <div class="card-icon bg-light-green mb-0">
                            <i class="fas fa-tasks"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="page-header">
            <h4>Ações Rápidas</h4>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="admin-card text-center p-4">
                    <div class="card-icon bg-light-blue mx-auto">
                        <i class="fas fa-plus"></i>
                    </div>
                    <h5>Novo Evento</h5>
                    <p class="small text-muted">Publique um novo evento no calendário escolar.</p>
                    <a href="gerenciar_eventos.php?action=add" class="btn btn-admin btn-admin-primary w-100">Adicionar</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="admin-card text-center p-4">
                    <div class="card-icon bg-light-yellow mx-auto">
                        <i class="fas fa-edit"></i>
                    </div>
                    <h5>Gerenciar Avisos</h5>
                    <p class="small text-muted">Edite ou remova comunicados da página inicial.</p>
                    <a href="gerenciar_avisos.php" class="btn btn-admin btn-outline-dark w-100">Acessar</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="admin-card text-center p-4">
                    <div class="card-icon bg-light-green mx-auto">
                        <i class="fas fa-cog"></i>
                    </div>
                    <h5>Configurações</h5>
                    <p class="small text-muted">Ajuste os parâmetros básicos do sistema.</p>
                    <a href="configuracoes.php" class="btn btn-admin btn-admin-primary w-100">Acessar</a>
                </div>
            </div>
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
