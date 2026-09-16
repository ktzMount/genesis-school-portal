<?php
/**
 * Script Temporário para Ajustar a Senha no Ambiente Local
 */
session_start();
require_once __DIR__ . '/../config/config.php';

echo "<h2>🔧 Diagnóstico e Ajuste de Senha - Colégio Gênesis</h2>";

try {
    // 1. Forçar a tabela a ter o tamanho correto (evita cortes no hash)
    $pdo->exec("ALTER TABLE users MODIFY COLUMN password_hash VARCHAR(255) NOT NULL");
    echo "✅ Coluna password_hash garantida com VARCHAR(255).<br>";

    // 2. Gerar o hash usando o PRÓPRIO motor PHP do seu servidor local
    $senha_pura = 'genesis@2026';
    $novo_hash  = password_hash($senha_pura, PASSWORD_DEFAULT);

    // 3. Deletar se já existir e reinserir de forma limpa
    $pdo->exec("DELETE FROM users WHERE username = 'coordenacao'");
    
    $stmt = $pdo->prepare("INSERT INTO users (username, password_hash, role) VALUES (?, ?, 'admin')");
    $stmt->execute(['coordenacao', $novo_hash]);

    echo "✅ Usuário 'coordenacao' recriado com sucesso!<br>";
    echo "🔑 Senha configurada para: <strong>genesis@2026</strong><br>";
    echo "📝 Hash gerado pelo seu servidor: <code>" . $novo_hash . "</code><br><br>";
    echo "<span style='color: green; font-weight: bold;'>Tudo pronto! Apague este arquivo por segurança e tente fazer o login agora.</span>";

} catch (Exception $e) {
    echo "<span style='color: red; font-weight: bold;'>Erro ao processar: " . $e->getMessage() . "</span>";
}