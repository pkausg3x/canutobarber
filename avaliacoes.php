<?php
session_start();
if (!isset($_SESSION['barber_id'])) {
    header("Location: login.php");
    exit();
}
include 'conexao.php';

// Fetch reviews with related info
$sql = "SELECT a.id, c.nome AS cliente_nome, b.nome AS barber_nome, a.nota, a.comentario, a.data_avaliacao
        FROM avaliacoes a
        JOIN clientes c ON a.cliente_id = c.id
        JOIN barbers b ON a.barber_id = b.id
        ORDER BY a.data_avaliacao DESC";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Avaliações - Canuto Barber</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Avaliações</h1>
    <a href="avaliacao_form.php" class="btn btn-success mb-3">Nova Avaliação</a>
    <a href="index.php" class="btn btn-secondary mb-3">Voltar</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Barbeiro</th>
                <th>Nota</th>
                <th>Comentário</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['cliente_nome']) ?></td>
                <td><?= htmlspecialchars($row['barber_nome']) ?></td>
                <td><?= $row['nota'] ?></td>
                <td><?= htmlspecialchars($row['comentario']) ?></td>
                <td><?= $row['data_avaliacao'] ?></td>
                <td>
                    <a href="avaliacao_form.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="avaliacao_delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
