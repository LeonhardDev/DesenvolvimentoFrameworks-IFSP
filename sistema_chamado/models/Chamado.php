<?php
class Chamado {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->prepare('SELECT * FROM chamados ORDER BY dt_abertura DESC, codigo DESC');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($codigo) {
        $stmt = $this->pdo->prepare('SELECT * FROM chamados WHERE codigo = ?');
        $stmt->execute([$codigo]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($dados) {
        foreach (['cliente', 'assunto', 'descricao', 'area', 'local'] as $campo) {
            if (!isset($dados[$campo]) || trim($dados[$campo]) === '') {
                throw new Exception("Campo $campo é obrigatório");
            }
        }

        $now = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));

        $nowFormatted = $now->format('Y-m-d H:i:s');


        $sql = 'INSERT INTO chamados (cliente, assunto, descricao, area, local, estado, dt_abertura, dt_ultima_alteracao)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
        
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $dados['cliente'],
            $dados['assunto'],
            $dados['descricao'],
            $dados['area'],
            $dados['local'],
            $dados['estado'] ?? 'Aberto',
            $nowFormatted,
            $nowFormatted
        ]);
    }

    public function update($codigo, $dados) {
        
        foreach (['assunto', 'descricao', 'area', 'local', 'estado'] as $campo) {
            if (!isset($dados[$campo]) || (is_string($dados[$campo]) && trim($dados[$campo]) === '')) {
                throw new Exception("Campo $campo é obrigatório para atualização");
            }
        }

        $now = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));

        $nowFormatted = $now->format('Y-m-d H:i:s');


        $sql = 'UPDATE chamados SET
                    assunto = ?, 
                    descricao = ?,
                    area = ?,
                    local = ?,
                    estado = ?,
                    dt_ultima_alteracao = ?
                WHERE codigo = ?';

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $dados['assunto'],
            $dados['descricao'],
            $dados['area'],
            $dados['local'],
            $dados['estado'],
            $nowFormatted,
            $codigo
        ]);
    }

    public function delete($codigo) {
        $sql = 'DELETE FROM chamados WHERE codigo = ?';
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$codigo]);
    }
}
