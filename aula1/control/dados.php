<?php
    class Dados{

        public $nome;
        public $idade;
        public $email;

        public function exibir(){
            echo $this->nome = "Leonardo" . "<br>";
            echo $this->idade = 19 . "<br>";
            echo $this->email = "leonardo@gmail.com";

        }
    }
?>