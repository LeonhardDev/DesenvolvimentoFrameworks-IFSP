<?php if ($chamado): ?>
<form action="tecnico.php?action=update&codigo=<?= htmlspecialchars($chamado['codigo']) ?>" method="post">
    <label>Assunto:<br>
        <input type="text" name="assunto" value="<?= htmlspecialchars($chamado['assunto'] ?? '') ?>" required>
    </label><br>

    <label>Descrição:<br>
        <textarea name="descricao" required><?= htmlspecialchars($chamado['descricao']) ?></textarea>
    </label><br>
    
    <label>Área:<br>
        <input type="text" name="area" value="<?= htmlspecialchars($chamado['area']) ?>" required>
    </label><br>
    
    <label>Local:<br>
        <input type="text" name="local" value="<?= htmlspecialchars($chamado['local']) ?>" required>
    </label><br>
    
    <label>Estado:<br>
        <select name="estado" required>
            <option value="Aberto" <?= ($chamado['estado'] ?? '') == 'Aberto' ? 'selected' : '' ?>>Aberto</option>
            <option value="Em Andamento" <?= ($chamado['estado'] ?? '') == 'Em Andamento' ? 'selected' : '' ?>>Em Andamento</option>
            <option value="Fechado" <?= ($chamado['estado'] ?? '') == 'Fechado' ? 'selected' : '' ?>>Fechado</option>
        </select>
    </label><br>
    
    <button type="submit">Salvar Alterações</button>
</form>
<?php else: ?>
<p>Chamado não encontrado!</p>
<?php endif; ?>
