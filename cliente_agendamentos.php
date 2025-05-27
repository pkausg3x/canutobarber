<?php
session_start();
if (!isset($_SESSION['cliente_id'])) {
    header("Location: cliente_login.php");
    exit();
}
include 'conexao.php';

$cliente_id = $_SESSION['cliente_id'];

// Fetch appointments for logged-in customer
$sql = "SELECT a.id, b.nome AS barber_nome, s.nome AS servico_nome, a.data_agendamento, a.hora, st.status_nome, fp.metodo AS forma_pagamento, a.observacoes
        FROM agendamentos a
        JOIN barbers b ON a.barber_id = b.id
        JOIN servicos s ON a.servico_id = s.id
        JOIN status_agendamento st ON a.status_id = st.id
        LEFT JOIN formas_pagamento fp ON a.forma_pagamento_id = fp.id
        WHERE a.cliente_id = ?
        ORDER BY a.data_agendamento DESC, a.hora DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $cliente_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Meus Agendamentos - Canuto Barber</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Meus Agendamentos</h1>
    <a href="cliente_agendamento.php" class="btn btn-primary mb-3">Novo Agendamento</a>
    <a href="cliente_login.php" class="btn btn-secondary mb-3">Voltar</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Barbeiro</th>
                <th>Serviço</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Status</th>
                <th>Forma de Pagamento</th>
                <th>Observações</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['barber_nome']) ?></td>
                <td><?= htmlspecialchars($row['servico_nome']) ?></td>
                <td><?= $row['data_agendamento'] ?></td>
                <td><?= substr($row['hora'], 0, 5) ?></td>
                <td><?= htmlspecialchars($row['status_nome']) ?></td>
                <td><?= htmlspecialchars($row['forma_pagamento'] ?? '') ?></td>
                <td><?= htmlspecialchars($row['observacoes']) ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
