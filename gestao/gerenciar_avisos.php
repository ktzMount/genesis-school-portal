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
        $date_published = $_POST['date_published'];
        $category = $_POST['category'];
        $excerpt = $_POST['excerpt'];
        $content = $_POST['content'];

        if ($action_post === 'add') {
            $stmt = $pdo->prepare("INSERT INTO news (title, date_published, category, excerpt, content) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$title, $date_published, $category, $excerpt, $content]);
            $msg = "Aviso publicado com sucesso!";
        } else {
            $stmt = $pdo->prepare("UPDATE news SET title=?, date_published=?, category=?, excerpt=?, content=? WHERE id=?");
            $stmt->execute([$title, $date_published, $category, $excerpt, $content, $id]);
            $msg = "Aviso atualizado com sucesso!";
        }
        $action = 'list';
    } elseif ($action_post === 'delete') {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM news WHERE id=?");
        $stmt->execute([$id]);
        $msg = "Aviso removido com sucesso!";
        $action = 'list';
    }
}

$newsToEdit = null;
if ($action === 'edit' && isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM news WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $newsToEdit = $stmt->fetch();
}

$newsList = $pdo->query("SELECT * FROM news ORDER BY id DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avisos | Painel de Gestão</title>
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
            <a href="gerenciar_avisos.php" class="active"><i class="fas fa-bullhorn"></i> Avisos</a>
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
                <h2>Gerenciar Avisos e Notícias</h2>
                <p class="text-muted">Publique comunicados oficiais e notícias para os pais e alunos.</p>
            </div>
            <?php if ($action === 'list'): ?>
                <a href="?action=add" class="btn btn-admin btn-admin-primary"><i class="fas fa-plus me-2"></i>Novo Aviso</a>
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
                                <th>Data Publicação</th>
                                <th>Categoria</th>
                                <th class="text-end">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($newsList as $n): ?>
                            <tr>
                                <td class="fw-bold"><?php echo htmlspecialchars($n['title']); ?></td>
                                <td><?php echo htmlspecialchars($n['date_published']); ?></td>
                                <td><span class="badge bg-light text-dark border"><?php echo htmlspecialchars($n['category']); ?></span></td>
                                <td class="text-end">
                                    <div class="btn-group shadow-sm">
                                        <a href="?action=edit&id=<?php echo $n['id']; ?>" class="btn btn-sm btn-white text-warning border"><i class="fas fa-edit"></i></a>
                                        <form method="POST" class="d-inline" onsubmit="return confirm('Tem certeza?');">
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="id" value="<?php echo $n['id']; ?>">
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
            <div class="admin-card col-lg-9 mx-auto">
                <form method="POST">
                    <input type="hidden" name="action" value="<?php echo $action; ?>">
                    <?php if ($newsToEdit): ?>
                        <input type="hidden" name="id" value="<?php echo $newsToEdit['id']; ?>">
                    <?php endif; ?>
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold">Título do Aviso</label>
                        <input type="text" name="title" class="form-control" required value="<?php echo $newsToEdit['title'] ?? ''; ?>">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-bold">Data de Exibição</label>
                            <input type="text" name="date_published" class="form-control" placeholder="Ex: 27 de Março de 2024" required value="<?php echo $newsToEdit['date_published'] ?? ''; ?>">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-bold">Categoria</label>
                            <input type="text" name="category" class="form-control" placeholder="Ex: Matrícula, Comunicado..." value="<?php echo $newsToEdit['category'] ?? ''; ?>">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Resumo (Curto)</label>
                        <textarea name="excerpt" class="form-control" rows="2" required><?php echo $newsToEdit['excerpt'] ?? ''; ?></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold">Conteúdo Completo</label>
                        <textarea name="content" class="form-control" rows="8" required><?php echo $newsToEdit['content'] ?? ''; ?></textarea>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-admin btn-admin-primary px-4">Salvar Aviso</button>
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
