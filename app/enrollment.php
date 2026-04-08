<?php
/**
 * Página Matrícula
 */
?>
<div class="container-fluid bg-light py-5">
    <div class="container">
        <h1 class="fw-bold mb-4">Matrícula</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="?page=home">Início</a></li>
                <li class="breadcrumb-item active">Matrícula</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-8">
                <h2 class="fw-bold mb-4">Processo de Matrícula</h2>
                
                <div class="accordion" id="accordionEnrollment">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                                <i class="fas fa-file-alt me-2 text-primary"></i> Passo 1: Inscrição
                            </button>
                        </h2>
                        <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#accordionEnrollment">
                            <div class="accordion-body">
                                <p>A primeira etapa é preencher o formulário de inscrição com dados básicos do aluno e responsáveis.</p>
                                <ul class="ms-3">
                                    <li>Dados pessoais do aluno</li>
                                    <li>Informações dos responsáveis</li>
                                    <li>Histórico escolar</li>
                                    <li>Informações de contato</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                                <i class="fas fa-clipboard-check me-2 text-primary"></i> Passo 2: Documentação
                            </button>
                        </h2>
                        <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionEnrollment">
                            <div class="accordion-body">
                                <p>Apresentação da documentação necessária:</p>
                                <ul class="ms-3">
                                    <li>Cópia do RG/CPF do aluno</li>
                                    <li>Certidão de Nascimento (original)</li>
                                    <li>Histórico Escolar</li>
                                    <li>Foto 3x4 (2 cópias)</li>
                                    <li>Comprovante de Endereço</li>
                                    <li>Comprovante de Renda Familiar</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                                <i class="fas fa-users me-2 text-primary"></i> Passo 3: Entrevista
                            </button>
                        </h2>
                        <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionEnrollment">
                            <div class="accordion-body">
                                <p>Entrevista com a coordenação para conhecer melhor o aluno e sua família.</p>
                                <p>Discussão sobre expectativas e necessidades específicas do aluno.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
                                <i class="fas fa-signature me-2 text-primary"></i> Passo 4: Formalização
                            </button>
                        </h2>
                        <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionEnrollment">
                            <div class="accordion-body">
                                <p>Assinatura de contratos e documentos formais de matrícula.</p>
                                <p>Definição de valores mensais e formas de pagamento.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-5">
                    <h3 class="fw-bold mb-3">Documentos Necessários</h3>
                    <div class="alert alert-info" role="alert">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Atenção:</strong> Todos os documentos devem ser apresentados em cópias simples, exceto a Certidão de Nascimento que deve ser original.
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="fas fa-phone me-2"></i> Agende uma Visita</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-4">Entre em contato conosco para agendar uma visita e conhecer melhor nossas instalações.</p>
                        
                        <form id="contactForm">
                            <div class="mb-3">
                                <label for="name" class="form-label">Seu Nome</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Telefone</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="mb-3">
                                <label for="series" class="form-label">Série/Ano</label>
                                <select class="form-select" id="series" name="series" required>
                                    <option>Selecione a série</option>
                                    <option>Maternal</option>
                                    <option>Pré-escolar</option>
                                    <option>1º Ano - Ensino Fundamental</option>
                                    <option>2º Ano - Ensino Fundamental</option>
                                    <option>3º Ano - Ensino Fundamental</option>
                                    <option>4º Ano - Ensino Fundamental</option>
                                    <option>5º Ano - Ensino Fundamental</option>
                                    <option>6º Ano - Ensino Fundamental</option>
                                    <option>7º Ano - Ensino Fundamental</option>
                                    <option>8º Ano - Ensino Fundamental</option>
                                    <option>9º Ano - Ensino Fundamental</option>
                                    <option>1º Ano - Ensino Médio</option>
                                    <option>2º Ano - Ensino Médio</option>
                                    <option>3º Ano - Ensino Médio</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Mensagem</label>
                                <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Enviar Solicitação</button>
                        </form>
                    </div>
                </div>

                <div class="card shadow-sm mt-3">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="fas fa-calendar-alt me-2"></i> Período de Inscrição</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">
                            <strong>Aberto:</strong> O ano todo<br>
                            <strong>Inscrições Especiais:</strong> Janeiro a Março<br>
                            <strong>Horários de Atendimento:</strong><br>
                            Seg-Sex: 08:00 - 18:00<br>
                            Sábado: 08:00 - 12:00
                        </p>
                    </div>
                </div>

                <div class="card shadow-sm mt-3">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="fas fa-map-marker-alt me-2"></i> Localização</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-0">
                            <?php echo SCHOOL_ADDRESS; ?><br>
                            <strong>Tel:</strong> <?php echo SCHOOL_PHONE; ?><br>
                            <strong>Email:</strong> <?php echo SCHOOL_EMAIL; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Valores e Bolsas -->
        <div class="row mt-5">
            <div class="col-12">
                <h2 class="fw-bold mb-4">Valores e Formas de Pagamento</h2>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3"><i class="fas fa-dollar-sign text-primary me-2"></i> Planos de Pagamento</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><strong>À vista:</strong> Desconto de 10%</li>
                            <li class="mb-2"><strong>12x:</strong> Sem juros</li>
                            <li class="mb-2"><strong>Débito em conta:</strong> Automático</li>
                            <li><strong>Boleto:</strong> 5 dias úteis após vencimento</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3"><i class="fas fa-graduation-cap text-primary me-2"></i> Programa de Bolsas</h5>
                        <p class="text-muted">
                            Genesis School oferece programa de bolsas de estudo para alunos com bom desempenho acadêmico
                            e para famílias em situação socioeconômica especial.
                        </p>
                        <a href="#" class="btn btn-sm btn-primary">Solicitar Bolsa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
