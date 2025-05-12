<?php
require_once 'controllers/TecnicoController.php';

$controller = new TecnicoController();
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?? 'list';
$pageTitle = "Painel do Técnico";



if (filter_input(INPUT_GET, 'status') === 'deleted') {
    echo "<p style='color: green; text-align: center;'>Chamado excluído com sucesso!</p>";
}

if ($action === 'edit' && isset($_GET['codigo'])) {
    $chamado = $controller->buscar($_GET['codigo']);
    $pageTitle = "Editar Chamado #" . htmlspecialchars($_GET['codigo']);
} elseif ($action === 'update' && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['codigo'])) {
    try {
        $controller->atualizar($_GET['codigo'], $_POST);
        header('Location: tecnico.php?status=updated'); // Redireciona para a lista
        exit();
    } catch (Exception $e) {
        $errorMessage = htmlspecialchars($e->getMessage());
        if (isset($_GET['codigo'])) {
            $chamado = $controller->buscar($_GET['codigo']);
        }
        $pageTitle = "Erro ao Atualizar Chamado";
    }
} else {
    $chamados = $controller->listarTodos();
    $pageTitle = "Lista de Chamados";
}

if ($action === 'delete' && isset($_GET['codigo'])) {
    try {
        $controller->deletar($_GET['codigo']);
        header('Location: tecnico.php?status=deleted');
        exit();
    } catch (Exception $e) {
        $errorMessage = "Erro ao excluir: " . htmlspecialchars($e->getMessage());
    }
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($errorMessage)) {
            echo "<p style='color: red; text-align: center;'>Erro: " . $errorMessage . "</p>";
        }
        if (filter_input(INPUT_GET, 'status') === 'updated') {
            echo "<p style='color: green; text-align: center;'>Chamado atualizado com sucesso!</p>";
        }

        if ($action === 'edit' && isset($chamado)) {
            include 'views/tecnico/editar.php';
        } else {
            include 'views/tecnico/listar.php';
        }
        ?>
    </div>
</body>
</html>
