<?php
/**
 * Página Eventos
 */

// Simular lista de eventos
$events = [
    [
        'id' => 1,
        'title' => 'Festa de Integração',
        'date' => '2024-04-10',
        'time' => '18:00 - 21:00',
        'location' => 'Quadra Poliesportiva',
        'description' => 'Festa de confraternização para integração da comunidade escolar. Haverá jogos, brincadeiras, música e comida.',
        'type' => 'Social'
    ],
    [
        'id' => 2,
        'title' => 'Mostra de Talentos',
        'date' => '2024-04-22',
        'time' => '19:00 - 22:00',
        'location' => 'Auditório Principal',
        'description' => 'Apresentações artísticas e culturais dos nossos alunos. Dança, música, teatro e muito mais!',
        'type' => 'Cultural'
    ],
    [
        'id' => 3,
        'title' => 'Campeonato de Xadrez',
        'date' => '2024-04-15',
        'time' => '14:00 - 18:00',
        'location' => 'Sala de Atividades',
        'description' => 'Campeonato interno de xadrez com premiações. Aberto a todos os alunos.',
        'type' => 'Esportivo'
    ],
    [
        'id' => 4,
        'title' => 'Aula de Campo - Parque Ecológico',
        'date' => '2024-05-08',
        'time' => '09:00 - 15:00',
        'location' => 'Parque Ecológico da Região',
        'description' => 'Aula de campo para alunos do 6º ao 9º ano. Atividades educativas sobre sustentabilidade e biologia.',
        'type' => 'Educacional'
    ],
    [
        'id' => 5,
        'title' => 'Festa Junina',
        'date' => '2024-06-20',
        'time' => '17:00 - 23:00',
        'location' => 'Área Externa da Escola',
        'description' => 'Festa junina tradicional com comidas típicas, danças e muita diversão para toda a família.',
        'type' => 'Social'
    ],
    [
        'id' => 6,
        'title' => 'Seminário Científico',
        'date' => '2024-05-25',
        'time' => '10:00 - 16:00',
        'location' => 'Auditório Principal',
        'description' => 'Apresentação de projetos científicos dos alunos. Aberto à comunidade.',
        'type' => 'Acadêmico'
    ]
];
?>
<div class="container-fluid bg-light py-5">
    <div class="container">
        <h1 class="fw-bold mb-4">Eventos</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="?page=home">Início</a></li>
                <li class="breadcrumb-item active">Eventos</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-8">
                <h2 class="fw-bold mb-4">Próximos Eventos</h2>
                
                <?php foreach ($events as $event): 
                    $date = new DateTime($event['date']);
                    $formatted_date = $date->format('d/m/Y');
                    $month = strtoupper($date->format('M'));
                    $day = $date->format('d');
                ?>
                <div class="card shadow-sm mb-4">
                    <div class="row g-0">
                        <div class="col-md-3 bg-primary text-white d-flex align-items-center justify-content-center" style="min-height: 150px;">
                            <div class="text-center">
                                <div class="display-5 fw-bold"><?php echo $day; ?></div>
                                <div class="fs-5"><?php echo $month; ?></div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h4 class="card-title fw-bold mb-0"><?php echo htmlspecialchars($event['title']); ?></h4>
                                    <span class="badge bg-info"><?php echo htmlspecialchars($event['type']); ?></span>
                                </div>
                                <p class="text-muted small mb-2">
                                    <i class="fas fa-clock me-2"></i><?php echo $event['time']; ?>
                                </p>
                                <p class="text-muted small mb-3">
                                    <i class="fas fa-map-marker-alt me-2"></i><?php echo htmlspecialchars($event['location']); ?>
                                </p>
                                <p class="card-text"><?php echo htmlspecialchars($event['description']); ?></p>
                                <a href="#" class="btn btn-primary btn-sm">Mais informações</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Sidebar -->
            <div class="col-md-4">
                <!-- Filtros -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0"><i class="fas fa-filter me-2"></i> Filtrar Eventos</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Tipo de Evento</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="social">
                                <label class="form-check-label" for="social">Social</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="cultural">
                                <label class="form-check-label" for="cultural">Cultural</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="esportivo">
                                <label class="form-check-label" for="esportivo">Esportivo</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="academico">
                                <label class="form-check-label" for="academico">Acadêmico</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Calendário -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0"><i class="fas fa-calendar me-2"></i> Calendário</h5>
                    </div>
                    <div class="card-body">
                        <div id="calendar" class="calendar-widget">
                            <!-- Aqui você pode adicionar um calendário interativo -->
                            <p class="text-center text-muted">
                                <strong>Abril de 2024</strong><br>
                                <small>10, 15, 22</small>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Informações -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0"><i class="fas fa-info-circle me-2"></i> Informações</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted small">
                            <strong>Dúvidas sobre eventos?</strong><br>
                            Entre em contato conosco via telefone ou email.
                        </p>
                        <div class="mt-3">
                            <p class="text-muted small mb-1">
                                <i class="fas fa-phone text-primary me-2"></i><?php echo SCHOOL_PHONE; ?>
                            </p>
                            <p class="text-muted small">
                                <i class="fas fa-envelope text-primary me-2"></i><?php echo SCHOOL_EMAIL; ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Inscrição em eventos -->
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">Inscrever-se em Evento</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="event-select" class="form-label">Selecione o evento</label>
                                <select class="form-select" id="event-select" required>
                                    <option>Escolha um evento</option>
                                    <?php foreach ($events as $event): ?>
                                    <option value="<?php echo $event['id']; ?>"><?php echo htmlspecialchars($event['title']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Seu Nome</label>
                                <input type="text" class="form-control" id="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Inscrever</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
