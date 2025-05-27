<?php
session_start();
if (!isset($_SESSION['cliente_id'])) {
    header("Location: cliente_login.php");
    exit();
}
include 'conexao.php';

// Fetch barbers, services, payment methods, and status options
$barbers = $conn->query("SELECT id, nome FROM barbers");
$servicos = $conn->query("SELECT id, nome FROM servicos");
$formas_pagamento = $conn->query("SELECT id, metodo FROM formas_pagamento");
$status_agendamento = $conn->query("SELECT id, status_nome FROM status_agendamento WHERE status_nome = 'Agendado'");

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cliente_id = $_SESSION['cliente_id'];
    $barber_id = $_POST['barber_id'];
    $servico_id = $_POST['servico_id'];
    $data_agendamento = $_POST['data_agendamento'];
    $hora = $_POST['hora'];
    $forma_pagamento_id = $_POST['forma_pagamento_id'];
    $observacoes = $_POST['observacoes'];
    
    // Get status_id for 'Agendado'
    $status_row = $status_agendamento->fetch_assoc();
    $status_id = $status_row['id'];

    $stmt = $conn->prepare("INSERT INTO agendamentos (cliente_id, barber_id, servico_id, data_agendamento, hora, status_id, forma_pagamento_id, observacoes) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iiisssis", $cliente_id, $barber_id, $servico_id, $data_agendamento, $hora, $status_id, $forma_pagamento_id, $observacoes);

    if ($stmt->execute()) {
        $success = "Agendamento criado com sucesso!";
    } else {
        $error = "Erro ao criar agendamento.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agendar Serviço</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Agendar Serviço</h1>
    <?php if ($error): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <?php if ($success): ?>
        <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>
    <form method="post">
        <div class="mb-3">
            <label>Barbeiro:</label>
            <select name="barber_id" class="form-select" required>
                <option value="">Selecione um barbeiro</option>
                <?php while ($row = $barbers->fetch_assoc()): ?>
                    <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['nome']) ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Serviço:</label>
            <select name="servico_id" class="form-select" required>
                <option value="">Selecione um serviço</option>
                <?php while ($row = $servicos->fetch_assoc()): ?>
                    <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['nome']) ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Data:</label>
            <input type="date" name="data_agendamento" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Hora:</label>
            <input type="time" name="hora" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Forma de Pagamento:</label>
            <select name="forma_pagamento_id" class="form-select" required>
                <option value="">Selecione uma forma de pagamento</option>
                <?php while ($row = $formas_pagamento->fetch_assoc()): ?>
                    <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['metodo']) ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Observações:</label>
            <textarea name="observacoes" class="form-control"></textarea>
        </div>
        <button class="btn btn-primary">Agendar</button>
        <a href="cliente_agendamentos.php" class="btn btn-secondary">Meus Agendamentos</a>
    </form>
</body>
</html>
