<?php
require_once __DIR__ . '/../models/Database.php';
require_once __DIR__ . '/../models/Chamado.php';

class ChamadoController {
    protected $dao;

    public function __construct() {
        $db = Database::getConnection();
        $this->dao = new Chamado($db);
    }

    public function listarTodos() {
        return $this->dao->getAll();
    }

    public function criar($dados) {
        $dadosTratados = $this->tratarDados($dados);
        return $this->dao->create($dadosTratados);
    }

    public function atualizar($codigo, $dados) {
        $dadosTratados = $this->tratarDados($dados);
        return $this->dao->update($codigo, $dadosTratados);
    }

    public function buscar($codigo) {
        return $this->dao->getById($codigo);
    }

    private function tratarDados($dados) {
        $dadosTratados = [
            'cliente' => trim($dados['cliente'] ?? ''),
            'assunto' => trim($dados['assunto'] ?? ''),
            'descricao' => trim($dados['descricao'] ?? ''),
            'area' => trim($dados['area'] ?? ''),
            'local' => trim($dados['local'] ?? ''),
            'estado' => $dados['estado'] ?? 'Aberto',
        ];
        return $dadosTratados;
    }

    public function deletar($codigo) {
        return $this->dao->delete($codigo);
    }
}
