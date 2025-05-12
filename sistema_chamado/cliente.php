<?php
require_once 'controllers/ChamadoController.php';

$controller = new ChamadoController();
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?? 'list'; // 'list' pode ser o padrão para consulta

if ($action === 'create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $controller->criar($_POST);
        header('Location: cliente.php?status=created');
        exit();
    } catch (Exception $e) {
        $errorMessage = htmlspecialchars($e->getMessage());
    }
}

$chamados = $controller->listarTodos();

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal do Cliente</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <?php
        // Exibir mensagem de erro ou sucesso, se houver
        if (isset($errorMessage)) {
            echo "<p style='color: red; text-align: center;'>Erro: " . $errorMessage . "</p>";
        }
        if (filter_input(INPUT_GET, 'status') === 'created') {
            echo "<p style='color: green; text-align: center;'>Chamado criado com sucesso!</p>";
        }
        ?>

        <?php include 'views/cliente/criar.php'; ?>

        <hr style="margin: 40px 0;">

        <?php include 'views/cliente/consultar.php'; ?>
    </div>
</body>
</html>
