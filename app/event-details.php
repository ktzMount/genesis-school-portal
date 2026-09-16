<?php
/**
 * Página Detalhes do Evento
 */

$event_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
$event = null;

// Tenta buscar do banco
try {
    $stmt = $pdo->prepare("SELECT id, title, event_date as date, event_time as time, location, description, type, image FROM events WHERE id = ?");
    $stmt->execute([$event_id]);
    $event = $stmt->fetch();
} catch (Exception $e) {}

// Fallback hardcoded para o ID 1
if (!$event && $event_id == 1) {
    $event = [
        'id'          => 1,
        'title'       => 'Mostra Literária do 9º Ano B',
        'date'        => date('Y') . '-09-15',
        'time'        => 'A partir das 18h',
        'location'    => 'Unidade 2 — Colégio Gênesis',
        'type'        => 'Cultural',
        'image'       => ASSETS_URL . 'images/mostra_literaria.jpg',
        'description' => "Vem aí a Mostra Literária do Colégio Gênesis!📚✨\n\nNo dia 15 de setembro, nossos alunos vão apresentar uma viagem pela história do Colégio Gênesis, mostrando como eram as escolas no passado e resgatando memórias que fazem parte da nossa trajetória. 💙💛\n\nUma manhã especial de literatura, criatividade, conhecimento e celebração dos nossos 20 anos de história!\n\n📅 15 de setembro\n⏰ A partir das 18h\n📍 Unidade 2 — Colégio Gênesis\n\nVenha prestigiar nossos alunos e viver esse momento especial com a gente! 💙✨"
    ];
}

// Se não achar evento, redireciona
if (!$event) {
    header("Location: ?page=events");
    exit;
}

$date = new DateTime($event['date']);
?>

<!-- Hero Interno -->
<div class="inner-hero">
    <div class="container-lg">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-inner mb-3">
                <li class="breadcrumb-item"><a href="?page=home">Início</a></li>
                <li class="breadcrumb-item"><a href="?page=events">Eventos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalhes do Evento</li>
            </ol>
        </nav>
        <span class="unit-hero-badge mb-2 d-inline-block"><?php echo htmlspecialchars($event['type']); ?></span>
        <h1 class="inner-hero-title"><?php echo htmlspecialchars($event['title']); ?></h1>
    </div>
</div>

<section class="py-5 bg-light">
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                    <?php if (!empty($event['image'])): ?>
                    <img src="<?php echo htmlspecialchars($event['image']); ?>" alt="<?php echo htmlspecialchars($event['title']); ?>" class="w-100" style="max-height: 450px; object-fit: cover;">
                    <?php endif; ?>
                    
                    <div class="card-body p-4 p-md-5">
                        <div class="d-flex flex-wrap gap-4 mb-4 pb-4 border-bottom">
                            <div class="d-flex align-items-center text-muted">
                                <i class="fas fa-calendar-alt fa-2x text-primary me-3"></i>
                                <div>
                                    <small class="d-block text-uppercase fw-bold">Data</small>
                                    <span class="fs-6"><?php echo $date->format('d/m/Y'); ?></span>
                                </div>
                            </div>
                            <?php if (!empty($event['time'])): ?>
                            <div class="d-flex align-items-center text-muted">
                                <i class="fas fa-clock fa-2x text-primary me-3"></i>
                                <div>
                                    <small class="d-block text-uppercase fw-bold">Horário</small>
                                    <span class="fs-6"><?php echo htmlspecialchars($event['time']); ?></span>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if (!empty($event['location'])): ?>
                            <div class="d-flex align-items-center text-muted">
                                <i class="fas fa-map-marker-alt fa-2x text-primary me-3"></i>
                                <div>
                                    <small class="d-block text-uppercase fw-bold">Local</small>
                                    <span class="fs-6"><?php echo htmlspecialchars($event['location']); ?></span>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>

                        <div class="fs-5" style="line-height: 1.8; color: #444; white-space: pre-wrap;"><?php echo htmlspecialchars($event['description']); ?></div>
                        
                        <div class="mt-5 text-center">
                            <a href="?page=events" class="btn btn-outline-secondary px-4 py-2 rounded-pill">
                                <i class="fas fa-arrow-left me-2"></i> Voltar para Eventos
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
