<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Chamado</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<h2>Abrir Novo Chamado</h2>
<form action="cliente.php?action=create" method="post">
    <label>Nome do Cliente:<br><input type="text" name="cliente" required></label><br>
    <label>Assunto:<br><input type="text" name="assunto" required></label><br>
    <label>Descrição do Problema:<br><textarea name="descricao" required></textarea></label><br>
    <label>Área:<br><input type="text" name="area" required></label><br>
    <label>Localização:<br><input type="text" name="local" required></label><br>
    <button type="submit">Abrir Chamado</button>
</form>

</body>
</html>
