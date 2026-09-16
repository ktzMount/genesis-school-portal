<?php
session_start();
require_once __DIR__ . '/../config/config.php';

if (!isset($_SESSION['gestao_logado']) || $_SESSION['gestao_logado'] !== true) {
    header('Location: login.php');
    exit;
}

$action = $_GET['action'] ?? 'list';
$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action_post = $_POST['action'] ?? '';
    if ($action_post === 'add' || $action_post === 'edit') {
        $id = $_POST['id'] ?? null;
        $title = $_POST['title'];
        $event_date = $_POST['event_date'];
        $event_time = $_POST['event_time'];
        $location = $_POST['location'];
        $description = $_POST['description'];
        $type = $_POST['type'];

        if ($action_post === 'add') {
            $stmt = $pdo->prepare("INSERT INTO events (title, event_date, event_time, location, description, type) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$title, $event_date, $event_time, $location, $description, $type]);
            $msg = "Evento adicionado com sucesso!";
        } else {
            $stmt = $pdo->prepare("UPDATE events SET title=?, event_date=?, event_time=?, location=?, description=?, type=? WHERE id=?");
            $stmt->execute([$title, $event_date, $event_time, $location, $description, $type, $id]);
            $msg = "Evento atualizado com sucesso!";
        }
        $action = 'list';
    } elseif ($action_post === 'delete') {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM events WHERE id=?");
        $stmt->execute([$id]);
        $msg = "Evento removido com sucesso!";
        $action = 'list';
    }
}

$eventToEdit = null;
if ($action === 'edit' && isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM events WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $eventToEdit = $stmt->fetch();
}

$events = $pdo->query("SELECT * FROM events ORDER BY event_date DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos | Painel de Gestão</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
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
            <a href="painel.php"><i class="fas fa-th-large"></i> Dashboard</a>
            <a href="gerenciar_eventos.php" class="active"><i class="fas fa-calendar-alt"></i> Eventos</a>
            <a href="gerenciar_avisos.php"><i class="fas fa-bullhorn"></i> Avisos</a>
            <a href="gerenciar_matriculas.php"><i class="fas fa-file-signature"></i> Matrículas</a>
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

        <div class="page-header d-flex justify-content-between align-items-center">
            <div>
                <h2>Gerenciar Eventos</h2>
                <p class="text-muted">Crie e edite os eventos do calendário escolar.</p>
            </div>
            <?php if ($action === 'list'): ?>
                <a href="?action=add" class="btn btn-admin btn-admin-primary"><i class="fas fa-plus me-2"></i>Novo Evento</a>
            <?php endif; ?>
        </div>

        <?php if ($msg): ?>
            <div class="alert alert-success border-0 shadow-sm alert-dismissible fade show">
                <i class="fas fa-check-circle me-2"></i> <?php echo $msg; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if ($action === 'list'): ?>
            <div class="admin-card">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Título</th>
                                <th>Data</th>
                                <th>Local</th>
                                <th>Tipo</th>
                                <th class="text-end">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($events as $e): ?>
                            <tr>
                                <td class="fw-bold text-primary"><?php echo htmlspecialchars($e['title']); ?></td>
                                <td><i class="far fa-calendar-alt me-2 text-muted"></i><?php echo date('d/m/Y', strtotime($e['event_date'])); ?></td>
                                <td><i class="fas fa-map-marker-alt me-2 text-muted"></i><?php echo htmlspecialchars($e['location']); ?></td>
                                <td><span class="badge bg-light-blue text-primary border"><?php echo htmlspecialchars($e['type']); ?></span></td>
                                <td class="text-end">
                                    <div class="btn-group shadow-sm">
                                        <a href="?action=edit&id=<?php echo $e['id']; ?>" class="btn btn-sm btn-white text-warning border" title="Editar"><i class="fas fa-edit"></i></a>
                                        <form method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja apagar este evento?');">
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="id" value="<?php echo $e['id']; ?>">
                                            <button type="submit" class="btn btn-sm btn-white text-danger border" title="Excluir"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php elseif ($action === 'add' || $action === 'edit'): ?>
            <div class="admin-card col-lg-8 mx-auto">
                <form method="POST">
                    <input type="hidden" name="action" value="<?php echo $action; ?>">
                    <?php if ($eventToEdit): ?>
                        <input type="hidden" name="id" value="<?php echo $eventToEdit['id']; ?>">
                    <?php endif; ?>
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold">Título do Evento</label>
                        <input type="text" name="title" class="form-control" required value="<?php echo $eventToEdit['title'] ?? ''; ?>" placeholder="Ex: Festa da Família">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-bold">Data</label>
                            <input type="date" name="event_date" class="form-control" required value="<?php echo $eventToEdit['event_date'] ?? ''; ?>">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-bold">Horário</label>
                            <input type="text" name="event_time" class="form-control" placeholder="Ex: 08:00 às 12:00" value="<?php echo $eventToEdit['event_time'] ?? ''; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-bold">Local</label>
                            <input type="text" name="location" class="form-control" value="<?php echo $eventToEdit['location'] ?? ''; ?>" placeholder="Ex: Auditório Principal">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-bold">Tipo / Categoria</label>
                            <input type="text" name="type" class="form-control" placeholder="Ex: Cultural, Esportivo..." value="<?php echo $eventToEdit['type'] ?? ''; ?>">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Descrição</label>
                        <textarea name="description" class="form-control" rows="4" placeholder="Detalhes sobre o evento..."><?php echo $eventToEdit['description'] ?? ''; ?></textarea>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-admin btn-admin-primary px-4">Salvar Evento</button>
                        <a href="?action=list" class="btn btn-admin btn-light border px-4">Cancelar</a>
                    </div>
                </form>
            </div>
        <?php endif; ?>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
