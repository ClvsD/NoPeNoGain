<?php

class Produto{

    private $id;
    private $modelo;
    private $marca;
    private $quantidade;
    private $valorunit;
    private $valortotal;
    private $tamanho;
    private $tipo;

    function getID() {
        return $this->id;
    }

    function getModelo() {
        return $this->modelo;
    }

    function getMarca() {
        return $this->marca;
    }

    function getQuantidade() {
        return $this->quantidade;
    }

    function getValorUnit() {
        return $this->valorunit;
    }

    function getValorTotal() {
        return $this->valortotal;
    }

    function getTamanho() {
        return $this->tamanho;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setID($id){
        $this->id = $id;
    }

    function setModelo($modelo){
        $this->modelo = $modelo;
    }

    function setMarca($marca){
        $this->marca = $marca;
    }

    function setQuantidade($quantidade){
        $this->quantidade = $quantidade;
    }

    function setValorUnit($valorunit){
        $this->valorunit = $valorunit;    
    }

    function setValorTotal($valortotal){
        $this->valortotal = $valortotal;
    }

    function setTamanho($tamanho){
        $this->tamanho = $tamanho;
    }

    function setTipo($tipo){
        $this->tipo = $tipo;
    }


}

?>