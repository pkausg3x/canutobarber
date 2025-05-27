<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Canuto Barber</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
        <a class="navbar-brand" href="index.php">Canuto Barber</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php if (isset($_SESSION['barber_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="agendamentos.php">Agendamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="avaliacoes.php">Avaliações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="logout.php">Sair</a>
                    </li>
                <?php elseif (isset($_SESSION['cliente_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="cliente_agendamento.php">Agendar Serviço</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cliente_agendamentos.php">Meus Agendamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="cliente_logout.php">Sair</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login Barbeiro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cliente_login.php">Login Cliente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cliente_cadastro.php">Cadastro Cliente</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
