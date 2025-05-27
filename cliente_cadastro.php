<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];

    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM clientes WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $error = "Email já cadastrado.";
    } else {
        $stmt = $conn->prepare("INSERT INTO clientes (nome, email, senha, telefone) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nome, $email, $senha, $telefone);
        if ($stmt->execute()) {
            header("Location: cliente_login.php");
            exit();
        } else {
            $error = "Erro ao cadastrar cliente.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Cliente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Cadastro de Cliente</h1>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <form method="post">
        <div class="mb-3">
            <label>Nome:</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Senha:</label>
            <input type="password" name="senha" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Telefone:</label>
            <input type="text" name="telefone" class="form-control" required>
        </div>
        <button class="btn btn-primary">Cadastrar</button>
        <a href="cliente_login.php" class="btn btn-secondary">Já tenho conta</a>
    </form>
</body>
</html>
