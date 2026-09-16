-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS genesis_school CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE genesis_school;

-- Tabela de Usuários (Acesso Gestão)
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role VARCHAR(50) DEFAULT 'admin',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Inserir usuário padrão 'coordenacao' (senha: genesis@2026)
INSERT INTO users (username, password_hash, role) VALUES ('coordenacao', '$2y$10$6fYyCQP4aW9iEi1tX8AwBugWDqEt0WAzzLV0e7I/XeLsYzYgZv3ji', 'admin') ON DUPLICATE KEY UPDATE password_hash = VALUES(password_hash);
-- Hash para 'genesis@2026' (gerado via password_hash('genesis@2026', PASSWORD_DEFAULT))

-- Tabela de Configurações Globais
CREATE TABLE IF NOT EXISTS settings (
    config_key VARCHAR(50) PRIMARY KEY,
    config_value TEXT,
    label VARCHAR(100)
);

-- Tabela de Eventos
CREATE TABLE IF NOT EXISTS events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    event_date DATE NOT NULL,
    event_time VARCHAR(50),
    location VARCHAR(150),
    description TEXT,
    type VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de Avisos/Notícias
CREATE TABLE IF NOT EXISTS news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    date_published VARCHAR(50) NOT NULL,
    category VARCHAR(50),
    excerpt TEXT,
    content TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de Passos de Matrícula
CREATE TABLE IF NOT EXISTS enrollment_steps (
    id INT AUTO_INCREMENT PRIMARY KEY,
    step_title VARCHAR(150) NOT NULL,
    step_description TEXT,
    icon VARCHAR(50),
    order_num INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ============================================
-- DADOS INICIAIS (SEED)
-- ============================================

-- Eventos de teste
INSERT INTO events (title, event_date, event_time, location, description, type) VALUES 
('Festa de Integração', '2024-04-10', '18:00 - 21:00', 'Quadra Poliesportiva', 'Festa de confraternização para integração da comunidade escolar. Haverá jogos, brincadeiras, música e comida.', 'Social'),
('Mostra de Talentos', '2024-04-22', '19:00 - 22:00', 'Auditório Principal', 'Apresentações artísticas e culturais dos nossos alunos. Dança, música, teatro e muito mais!', 'Cultural'),
('Campeonato de Xadrez', '2024-04-15', '14:00 - 18:00', 'Sala de Atividades', 'Campeonato interno de xadrez com premiações. Aberto a todos os alunos.', 'Esportivo');

-- Avisos de teste
INSERT INTO news (title, date_published, category, excerpt, content) VALUES
('Inscrições para Matrícula Abertas', '27 de março de 2024', 'Matrícula', 'Inscrições para o ano letivo 2024 estão abertas. Aproveite para garantir a vaga do seu filho.', 'Inscrições para o ano letivo 2024 estão abertas. Temos vagas limitadas em todas as séries. Aproveite para garantir a vaga do seu filho. Agende uma visita e conheça nossas instalações.'),
('Calendário Escolar Divulgado', '25 de março de 2024', 'Informações', 'Confira o calendário completo do ano letivo com datas importantes de avaliações e eventos.', 'O calendário escolar de 2024 foi oficialmente divulgado. Confira os períodos de provas, férias e eventos especiais durante o ano.');

-- Passos de Matrícula de teste
INSERT INTO enrollment_steps (step_title, step_description, icon, order_num) VALUES
('Passo 1: Inscrição', '<p>A primeira etapa é preencher o formulário de inscrição com dados básicos do aluno e responsáveis.</p><ul><li>Dados pessoais do aluno</li><li>Informações dos responsáveis</li><li>Histórico escolar</li><li>Informações de contato</li></ul>', 'fa-file-alt', 1),
('Passo 2: Documentação', '<p>Apresentação da documentação necessária:</p><ul><li>Cópia do RG/CPF do aluno</li><li>Certidão de Nascimento (original)</li><li>Histórico Escolar</li><li>Foto 3x4 (2 cópias)</li><li>Comprovante de Endereço</li></ul>', 'fa-clipboard-check', 2),
('Passo 3: Entrevista', '<p>Entrevista com a coordenação para conhecer melhor o aluno e sua família.</p><p>Discussão sobre expectativas e necessidades específicas do aluno.</p>', 'fa-users', 3),
('Passo 4: Formalização', '<p>Assinatura de contratos e documentos formais de matrícula.</p><p>Definição de valores mensais e formas de pagamento.</p>', 'fa-signature', 4);

-- Configurações de teste
INSERT IGNORE INTO settings (config_key, config_value, label) VALUES
('school_name', 'Colégio Gênesis', 'Nome da Escola'),
('school_phone', '(11) 4002-8922', 'Telefone de Contato'),
('school_email', 'contato@colegiogenesis.com.br', 'E-mail de Contato'),
('school_address', 'Rua das Flores, 123 - Centro, São Paulo - SP', 'Endereço da Escola'),
('school_maps', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.1975!2d-46.65!3d-23.56!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjPCsDMzJzM2LjAiUyA0NsKwMzknMDAuMCJX!5e0!3m2!1spt-BR!2sbr!4v1620000000000', 'Link Google Maps (Embed)');
