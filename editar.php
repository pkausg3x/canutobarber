<?php
session_start();
if (!isset($_SESSION['barber_id'])) {
    header("Location: login.php");
    exit();
}
include 'conexao.php';
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $conn->prepare("UPDATE clientes SET nome=?, telefone=?, email=?, senha=? WHERE id=?");
    $stmt->bind_param("ssssi", $nome, $telefone, $email, $senha, $id);
    $stmt->execute();

    header("Location: index.php");
}

$sql = "SELECT * FROM clientes WHERE id=$id";
$result = $conn->query($sql);
$cliente = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Editar Cliente</h1>
    <form method="post">
        <div class="mb-3">
            <label>Nome:</label>
            <input type="text" name="nome" class="form-control" value="<?= $cliente['nome'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Telefone:</label>
            <input type="text" name="telefone" class="form-control" value="<?= $cliente['telefone'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="<?= $cliente['email'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Senha:</label>
            <div class="input-group">
                <input type="password" id="senha" name="senha" class="form-control" value="<?= $cliente['senha'] ?>" required>
                <button type="button" class="btn btn-outline-secondary" id="toggleSenha">Mostrar</button>
            </div>
        </div>
        <button class="btn btn-primary">Salvar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>

    <script>
        const toggleSenha = document.getElementById('toggleSenha');
        const senhaInput = document.getElementById('senha');

        toggleSenha.addEventListener('click', function () {
            if (senhaInput.type === 'password') {
                senhaInput.type = 'text';
                toggleSenha.textContent = 'Ocultar';
            } else {
                senhaInput.type = 'password';
                toggleSenha.textContent = 'Mostrar';
            }
        });
    </script>
</body>
</html>
