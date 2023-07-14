<?php

class Criptografia{
    private $algoritmo;
    private $chave;
    private $iv;
    private $texto;
    
    public function __construct(){
        $this->algoritmo = "AES-256-CBC";
        $this->chave = "minha_chave";
        $this->iv = "wNYtCnelXfOa6uiJ";
    }

    public function setChave($chave){
        $this->chave = sha1($chave);
    }

    public function _en($texto){
        $this->texto = $texto;
        $mensagem = openssl_encrypt($this->texto, $this->algoritmo, $this->chave, OPENSSL_RAW_DATA, $this->iv);
        return $mensagem;
    }

    public function _de($texto){
        $this->texto = $texto;
        $mensagem = openssl_decrypt(base64_decode($this->texto), $this->algoritmo, $this->chave, OPENSSL_RAW_DATA, $this->iv);
        return $mensagem;
    }
}

$teste = new Criptografia();
$teste->setChave("123");
echo $teste->_en("teste");
?>
