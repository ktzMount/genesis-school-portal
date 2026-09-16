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
        $step_title = $_POST['step_title'];
        $step_description = $_POST['step_description'];
        $icon = $_POST['icon'];
        $order_num = $_POST['order_num'];

        if ($action_post === 'add') {
            $stmt = $pdo->prepare("INSERT INTO enrollment_steps (step_title, step_description, icon, order_num) VALUES (?, ?, ?, ?)");
            $stmt->execute([$step_title, $step_description, $icon, $order_num]);
            $msg = "Passo de matrícula adicionado!";
        } else {
            $stmt = $pdo->prepare("UPDATE enrollment_steps SET step_title=?, step_description=?, icon=?, order_num=? WHERE id=?");
            $stmt->execute([$step_title, $step_description, $icon, $order_num, $id]);
            $msg = "Passo atualizado!";
        }
        $action = 'list';
    } elseif ($action_post === 'delete') {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM enrollment_steps WHERE id=?");
        $stmt->execute([$id]);
        $msg = "Passo removido!";
        $action = 'list';
    }
}

$stepToEdit = null;
if ($action === 'edit' && isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM enrollment_steps WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $stepToEdit = $stmt->fetch();
}

$steps = $pdo->query("SELECT * FROM enrollment_steps ORDER BY order_num ASC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrículas | Painel de Gestão</title>
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
            <a href="gerenciar_matriculas.php" class="active"><i class="fas fa-file-signature"></i> Matrículas</a>
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
                <h2>Processo de Matrícula</h2>
                <p class="text-muted">Gerencie os passos e dúvidas frequentes do processo de matrícula.</p>
            </div>
            <?php if ($action === 'list'): ?>
                <a href="?action=add" class="btn btn-admin btn-admin-primary"><i class="fas fa-plus me-2"></i>Novo Passo</a>
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
                                <th width="80">Ordem</th>
                                <th width="80">Ícone</th>
                                <th>Título</th>
                                <th class="text-end">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($steps as $s): ?>
                            <tr>
                                <td class="fw-bold"><?php echo htmlspecialchars($s['order_num']); ?></td>
                                <td class="text-center"><i class="fas <?php echo htmlspecialchars($s['icon']); ?> fs-4 text-primary"></i></td>
                                <td class="fw-bold"><?php echo htmlspecialchars($s['step_title']); ?></td>
                                <td class="text-end">
                                    <div class="btn-group shadow-sm">
                                        <a href="?action=edit&id=<?php echo $s['id']; ?>" class="btn btn-sm btn-white text-warning border"><i class="fas fa-edit"></i></a>
                                        <form method="POST" class="d-inline" onsubmit="return confirm('Tem certeza?');">
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="id" value="<?php echo $s['id']; ?>">
                                            <button type="submit" class="btn btn-sm btn-white text-danger border"><i class="fas fa-trash"></i></button>
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
                    <?php if ($stepToEdit): ?>
                        <input type="hidden" name="id" value="<?php echo $stepToEdit['id']; ?>">
                    <?php endif; ?>
                    
                    <div class="row">
                        <div class="col-md-3 mb-4">
                            <label class="form-label fw-bold">Ordem de Exibição</label>
                            <input type="number" name="order_num" class="form-control" required value="<?php echo $stepToEdit['order_num'] ?? '0'; ?>">
                        </div>
                        <div class="col-md-9 mb-4">
                            <label class="form-label fw-bold">Título do Passo</label>
                            <input type="text" name="step_title" class="form-control" required value="<?php echo $stepToEdit['step_title'] ?? ''; ?>">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Ícone (FontAwesome Class)</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                            <input type="text" name="icon" class="form-control" placeholder="Ex: fa-file-alt" value="<?php echo $stepToEdit['icon'] ?? 'fa-file-alt'; ?>">
                        </div>
                        <small class="text-muted">Use classes como fa-users, fa-clipboard-check, etc.</small>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Descrição (HTML Permitido)</label>
                        <textarea name="step_description" class="form-control" rows="10" required><?php echo $stepToEdit['step_description'] ?? ''; ?></textarea>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-admin btn-admin-primary px-4">Salvar Passo</button>
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
