<?php
// Credenciais corretas definidas em variáveis PHP
$usuario_correto = "admin";
$senha_correta = "123456";

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"] ?? "";
    $senha = $_POST["senha"] ?? "";

    if ($usuario === $usuario_correto && $senha === $senha_correta) {
        $mensagem = "<p class='sucesso'>Login realizado com sucesso</p>";
    } else {
        $mensagem = "<p class='erro'>Usuário ou senha incorretos</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Página de Login</title>
    
</head>
<body>

<div class="login-card">
    <h2 style="text-align: center;">Login</h2>
    
    <?php echo $mensagem; ?>

    <form id="login-form" method="POST" action="">
        <label for="usuario">Usuário:</label>
        <input type="text" id="usuario" name="usuario" required>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>

        <button type="submit" class="btn-entrar">Entrar</button>
    </form>
</div>

</body>
</html>

<!--
DIFERENÇA ENTRE GET E POST:

- GET:
  * Os dados do formulário são visíveis no URL (ex.: pagina.php?usuario=admin&senha=123).
  * Não é seguro para dados confidenciais ou palavras-passe/senhas.
  * Possui limitação no tamanho do envio de dados.

- POST:
  * Os dados são enviados de forma oculta no corpo (body) do pedido HTTP.
  * É o método seguro e indicado para autenticação, formulários de login e registos.
  * Não expõe informações no histórico nem no URL do navegador.
-->