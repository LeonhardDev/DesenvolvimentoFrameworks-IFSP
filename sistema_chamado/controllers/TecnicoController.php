<?php
require_once __DIR__ . '/ChamadoController.php';

class TecnicoController {
    private $chamadoCtrl;

    public function __construct() {
        $this->chamadoCtrl = new ChamadoController();
    }

    public function listarTodos() {
        return $this->chamadoCtrl->listarTodos();
    }

    public function atualizar($codigo, $dados) {
        return $this->chamadoCtrl->atualizar($codigo, $dados);
    }

    public function buscar($codigo) {
        return $this->chamadoCtrl->buscar($codigo);
    }
    
    public function deletar($codigo) {
        return $this->chamadoCtrl->deletar($codigo);
    }
}
