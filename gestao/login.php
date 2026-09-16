<?php
/**
 * Login - Gestão Escolar | Colégio Gênesis
 * Acesso restrito à coordenação escolar.
 * Rota: /colegio_genesis/gestao/login.php
 */

session_start();

require_once __DIR__ . '/../config/config.php';

// Conexão via PDO vem do config.php ($pdo)

$erro = '';
$sucesso = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario  = trim($_POST['usuario'] ?? '');
    $senha    = $_POST['senha'] ?? '';

    // Verificar CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== ($_SESSION['csrf_token'] ?? '')) {
        $erro = 'Requisição inválida. Tente novamente.';
    } elseif (empty($usuario) || empty($senha)) {
        $erro = 'Por favor, preencha todos os campos.';
    } else {
        // Busca usuário no banco de dados
        $stmt = $pdo->prepare("SELECT id, username, password_hash, role FROM users WHERE LOWER(username) = LOWER(?) LIMIT 1");
        $stmt->execute([$usuario]);
        $user = $stmt->fetch();

        if ($user && password_verify($senha, $user['password_hash'])) {
            $_SESSION['gestao_logado']  = true;
            $_SESSION['gestao_usuario'] = $user['username'];
            $_SESSION['gestao_role']    = $user['role'];
            $_SESSION['gestao_tempo']   = time();
            // Redirecionar para o painel
            header('Location: painel.php');
            exit;
        } else {
            // Atraso para dificultar brute-force
            sleep(1);
            $erro = 'Usuário ou senha incorretos.';
        }
    }
}

// Gerar CSRF token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso Restrito | Colégio Gênesis</title>
    <meta name="robots" content="noindex, nofollow">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #0d4fa8;
            --primary-dark:  #0a3d85;
            --primary-deep:  #08345a;
            --accent-color:  #ffd400;
            --accent-dark:   #e6b800;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        html, body {
            height: 100%;
            font-family: 'Open Sans', sans-serif;
        }

        body {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-deep) 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            position: relative;
            overflow: hidden;
        }

        /* Fundo animado */
        body::before {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(255,212,0,0.08) 0%, transparent 70%);
            top: -100px;
            right: -100px;
            border-radius: 50%;
            animation: pulse-bg 6s ease-in-out infinite;
        }

        body::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(255,255,255,0.04) 0%, transparent 70%);
            bottom: -80px;
            left: -80px;
            border-radius: 50%;
            animation: pulse-bg 8s ease-in-out infinite reverse;
        }

        @keyframes pulse-bg {
            0%, 100% { transform: scale(1); opacity: 1; }
            50%       { transform: scale(1.15); opacity: 0.7; }
        }

        /* Card */
        .login-card {
            background: #fff;
            border-radius: 16px;
            padding: 2.2rem 2rem;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            position: relative;
            z-index: 10;
            animation: slideUp 0.45s cubic-bezier(0.22, 1, 0.36, 1);
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* Ícone do topo */
        .login-icon-wrap {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.2rem;
            box-shadow: 0 6px 18px rgba(13, 79, 168, 0.3);
        }

        .login-icon-wrap i {
            font-size: 1.5rem;
            color: #fff;
        }

        /* Títulos */
        .login-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.35rem;
            font-weight: 800;
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 0.2rem;
        }

        .login-subtitle {
            text-align: center;
            color: #6c757d;
            font-size: 0.83rem;
            margin-bottom: 1.2rem;
        }

        /* Badge restrito */
        .badge-restrito {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            background: rgba(220, 53, 69, 0.08);
            color: #dc3545;
            border: 1px solid rgba(220, 53, 69, 0.22);
            border-radius: 30px;
            padding: 0.25rem 0.8rem;
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.4px;
            margin: 0 auto 1.4rem;
            width: fit-content;
        }

        /* Form */
        .form-group { margin-bottom: 1rem; }

        .form-label {
            font-weight: 600;
            color: var(--primary-color);
            font-size: 0.83rem;
            margin-bottom: 0.4rem;
            display: block;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #bbb;
            font-size: 0.85rem;
            pointer-events: none;
            transition: color 0.2s;
        }

        .input-wrap input {
            width: 100%;
            padding: 0.65rem 1rem 0.65rem 2.4rem;
            border: 1.5px solid #e0e0e0;
            border-radius: 8px;
            font-size: 0.92rem;
            font-family: 'Open Sans', sans-serif;
            transition: border-color 0.2s, box-shadow 0.2s;
            background: #f9f9f9;
            color: #333;
        }

        .input-wrap input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(13, 79, 168, 0.1);
            background: #fff;
        }

        .input-wrap:focus-within .input-icon {
            color: var(--primary-color);
        }

        /* Toggle senha */
        .toggle-senha {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #bbb;
            font-size: 0.85rem;
            padding: 0;
            transition: color 0.2s;
        }

        .toggle-senha:hover { color: var(--primary-color); }

        /* Erro */
        .alert-erro {
            background: rgba(220, 53, 69, 0.07);
            border: 1px solid rgba(220, 53, 69, 0.25);
            border-radius: 8px;
            padding: 0.65rem 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #dc3545;
            font-size: 0.83rem;
            margin-bottom: 1rem;
            animation: shake 0.4s ease;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%       { transform: translateX(-5px); }
            40%       { transform: translateX(5px); }
            60%       { transform: translateX(-3px); }
            80%       { transform: translateX(3px); }
        }

        /* Botão */
        .btn-login {
            width: 100%;
            padding: 0.75rem;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: #fff;
            border: none;
            border-radius: 8px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.22s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 0.4rem;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-deep));
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(13, 79, 168, 0.35);
        }

        .btn-login:active { transform: translateY(0); }

        /* Rodapé do card */
        .login-footer {
            text-align: center;
            margin-top: 1.4rem;
            padding-top: 1.1rem;
            border-top: 1px solid #f0f0f0;
        }

        .login-footer a {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 0.83rem;
            font-weight: 500;
            transition: color 0.2s;
        }

        .login-footer a:hover {
            color: var(--accent-dark);
            text-decoration: underline;
        }

        .login-footer p {
            color: #bbb;
            font-size: 0.75rem;
            margin-top: 0.6rem;
        }

        /* Stripe no topo do card */
        .card-accent {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--accent-color), var(--primary-color));
            border-radius: 16px 16px 0 0;
        }

        /* Responsivo mobile */
        @media (max-width: 480px) {
            .login-card {
                padding: 1.8rem 1.4rem;
                border-radius: 12px;
            }
        }
    </style>
</head>
<body>

    <div class="login-card">
        <!-- Stripe colorida no topo -->
        <div class="card-accent"></div>

        <!-- Ícone -->
        <div class="login-icon-wrap">
            <i class="fas fa-shield-alt"></i>
        </div>

        <!-- Título -->
        <h1 class="login-title">Gestão Escolar</h1>
        <p class="login-subtitle">Colégio Gênesis — Área Administrativa</p>

        <!-- Badge -->
        <div class="badge-restrito">
            <i class="fas fa-lock"></i> Acesso Restrito
        </div>

        <!-- Mensagem de erro -->
        <?php if (!empty($erro)): ?>
        <div class="alert-erro">
            <i class="fas fa-exclamation-circle"></i>
            <?php echo htmlspecialchars($erro); ?>
        </div>
        <?php endif; ?>

        <!-- Formulário -->
        <form method="POST" action="" autocomplete="off" novalidate id="form-login">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">

            <div class="form-group">
                <label class="form-label" for="usuario">
                    <i class="fas fa-user me-1"></i> Usuário
                </label>
                <div class="input-wrap">
                    <input
                        type="text"
                        id="usuario"
                        name="usuario"
                        placeholder="Digite seu usuário"
                        value="<?php echo htmlspecialchars($_POST['usuario'] ?? ''); ?>"
                        required
                        autocomplete="username"
                    >
                    <i class="fas fa-user input-icon"></i>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="senha">
                    <i class="fas fa-key me-1"></i> Senha
                </label>
                <div class="input-wrap">
                    <input
                        type="password"
                        id="senha"
                        name="senha"
                        placeholder="Digite sua senha"
                        required
                        autocomplete="current-password"
                    >
                    <i class="fas fa-lock input-icon"></i>
                    <button type="button" class="toggle-senha" id="toggle-senha" aria-label="Mostrar senha">
                        <i class="fas fa-eye" id="eye-icon"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn-login" id="btn-entrar">
                <i class="fas fa-sign-in-alt"></i> Entrar
            </button>
        </form>

        <!-- Rodapé -->
        <div class="login-footer">
            <a href="<?php echo BASE_URL; ?>">
                <i class="fas fa-arrow-left me-1"></i> Voltar ao site
            </a>
            <p>&copy; <?php echo date('Y'); ?> Colégio Gênesis — Uso exclusivo da coordenação</p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Toggle mostrar/ocultar senha
        const toggleBtn  = document.getElementById('toggle-senha');
        const senhaInput = document.getElementById('senha');
        const eyeIcon    = document.getElementById('eye-icon');

        toggleBtn.addEventListener('click', () => {
            const isPassword = senhaInput.type === 'password';
            senhaInput.type  = isPassword ? 'text' : 'password';
            eyeIcon.className = isPassword ? 'fas fa-eye-slash' : 'fas fa-eye';
        });

        // Loading state no botão
        document.getElementById('form-login').addEventListener('submit', function () {
            const btn = document.getElementById('btn-entrar');
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Verificando...';
            setTimeout(function() {
                btn.disabled = true;
            }, 0);
        });
    </script>
</body>
</html>
