<h2>Meus Chamados Abertos</h2>
<div class="chamados-list">
    <?php if (!empty($chamados)): ?>
        <?php foreach ($chamados as $chamado): ?>
        <div class="chamado-card">
            <div class="chamado-card-header">
                <span class="chamado-info"><strong>Cód:</strong> <?= htmlspecialchars($chamado['codigo']) ?></span>
                <span class="chamado-info"><strong>Cliente:</strong> <?= htmlspecialchars($chamado['cliente']) ?></span>
                <span class="chamado-info chamado-assunto"><strong>Assunto:</strong> <?= htmlspecialchars($chamado['assunto']) ?></span>
                <span class="chamado-info"><strong>Área:</strong> <?= htmlspecialchars($chamado['area']) ?></span>
                <span class="chamado-info"><strong>Local:</strong> <?= htmlspecialchars($chamado['local']) ?></span>
                <span class="chamado-info chamado-estado chamado-estado-<?= strtolower(str_replace(' ', '-', htmlspecialchars($chamado['estado']))) ?>">
                    <strong>Estado:</strong> <?= htmlspecialchars($chamado['estado']) ?>
                </span>
            </div>
            <div class="chamado-card-body">
                <div class="chamado-info-row">
                    <span class="chamado-info chamado-descricao"><strong>Descrição:</strong> <?= nl2br(htmlspecialchars($chamado['descricao'])) ?></span>
                </div>
                <div class="chamado-info-row">
                    <span class="chamado-info"><strong>Abertura:</strong> <?= htmlspecialchars(date('d/m/Y H:i', strtotime($chamado['dt_abertura']))) ?></span>
                    <span class="chamado-info"><strong>Últ. Atualização:</strong> <?= htmlspecialchars(date('d/m/Y H:i', strtotime($chamado['dt_ultima_alteracao']))) ?></span>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nenhum chamado encontrado.</p>
    <?php endif; ?>
</div>
