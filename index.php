<?php
session_start();
if (!isset($_SESSION['barber_id'])) {
    header("Location: login.php");
    exit();
}
include 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Canuto Barber - Clientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Clientes da Canuto Barber</h1>
    <a href="cadastrar.php" class="btn btn-success mb-3">Cadastrar Novo Cliente</a>
    <a href="dashboard.php" class="btn btn-primary mb-3 float-end">Dashboard</a>
    <a href="logout.php" class="btn btn-danger mb-3 float-end me-2">Sair</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM clientes";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()):
        ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nome'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['telefone'] ?></td>
                <td>
                    <a href="editar.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="excluir.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
