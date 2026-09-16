<?php
/**
 * Página Eventos — visual de site escolar, sem sidebar de blog
 */

$events = [
    [
        'id'          => 1,
        'title'       => 'Mostra Literária do 9º Ano B',
        'date'        => date('Y') . '-09-15',
        'time'        => '08:00 - 13:00',
        'location'    => 'Colégio Gênesis',
        'description' => '20 anos do Gênesis e evolução da escola. Apresentações de dança, música, teatro e exposição de trabalhos feitos pelos alunos.',
        'type'        => 'Cultural',
        'image'       => ASSETS_URL . 'images/mostra_literaria.jpg'
    ]
];

try {
    $stmt = $pdo->query("SELECT id, title, event_date as date, event_time as time, location, description, type, image FROM events ORDER BY event_date ASC");
    if ($stmt) {
        $db_events = $stmt->fetchAll();
        // Merge somente os que têm imagem
        foreach ($db_events as $ev) {
            if (!empty($ev['image'])) $events[] = $ev;
        }
    }
} catch (Exception $e) {}
?>

<!-- Hero Interno -->
<div class="inner-hero">
    <div class="container-lg">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-inner mb-3">
                <li class="breadcrumb-item"><a href="?page=home">Início</a></li>
                <li class="breadcrumb-item active">Eventos</li>
            </ol>
        </nav>
        <h1 class="inner-hero-title"><i class="fas fa-calendar-star me-2"></i>Eventos</h1>
        <p class="inner-hero-subtitle">Acompanhe o que está acontecendo e o que está por vir no Colégio Gênesis.</p>
    </div>
</div>

<section class="events-grid-section py-5">
    <div class="container-lg">
        <?php if (empty($events)): ?>
            <div class="text-center py-5">
                <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">Nenhum evento cadastrado no momento.</h4>
                <p class="text-muted">Fique de olho, novidades chegam em breve!</p>
            </div>
        <?php else: ?>
        <div class="row g-4">
            <?php foreach ($events as $event):
                $date = new DateTime($event['date']);
                $day   = $date->format('d');
                $month = strtoupper($date->format('M'));
                $year  = $date->format('Y');
            ?>
            <div class="col-md-6 col-lg-4">
                <div class="event-card h-100">
                    <?php if (!empty($event['image'])): ?>
                    <div class="event-card-img-wrapper">
                        <img src="<?php echo htmlspecialchars($event['image']); ?>" alt="<?php echo htmlspecialchars($event['title']); ?>" class="event-card-img">
                        <div class="event-card-date-badge">
                            <span class="event-date-day"><?php echo $day; ?></span>
                            <span class="event-date-month"><?php echo $month; ?></span>
                        </div>
                        <span class="event-type-badge"><?php echo htmlspecialchars($event['type']); ?></span>
                    </div>
                    <?php endif; ?>
                    <div class="event-card-body">
                        <h3 class="event-card-title"><?php echo htmlspecialchars($event['title']); ?></h3>
                        <div class="event-card-meta">
                            <?php if (!empty($event['time'])): ?>
                            <span><i class="fas fa-clock me-1"></i><?php echo htmlspecialchars($event['time']); ?></span>
                            <?php endif; ?>
                            <?php if (!empty($event['location'])): ?>
                            <span><i class="fas fa-map-marker-alt me-1"></i><?php echo htmlspecialchars($event['location']); ?></span>
                            <?php endif; ?>
                        </div>
                        <p class="event-card-desc"><?php echo htmlspecialchars($event['description']); ?></p>
                        <a href="?page=event-details&id=<?php echo $event['id']; ?>" class="btn btn-event-cta">
                            <i class="fas fa-info-circle me-1"></i>Saber Mais
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
