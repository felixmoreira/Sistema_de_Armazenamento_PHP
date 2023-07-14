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
        return $this->chave;
    }

    public function _en($texto){
        $this->texto = $texto;
        $mensagem = openssl_encrypt($this->texto, $GLOBALS["seguranca"]["algoritmo"], $chave, OPENSSL_RAW_DATA, $GLOBALS["seguranca"]["iv"]);
    }
}
