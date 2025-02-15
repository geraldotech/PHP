<?php
/**
 * HELPER
 */
class Helper {

    protected $db;

    public function __construct() {
        global $db;
        $this->db = $db;
    }
    
    /**
     * Mostra o alert com a mensagem de erro ou sucesso, se contem na
     */
    public function alertMessage() {
        $type = '';
        // Atribuo á variavel $type o tipo de mensagem a ser exibida
        if (isset($_SESSION['msg']['success']) && $_SESSION['msg']['success'] != ''):
            $type = 'success';
        elseif (isset($_SESSION['msg']['error']) && $_SESSION['msg']['error'] != ''):
            $type = 'error';
        elseif (isset($_SESSION['msg']['warning']) && $_SESSION['msg']['warning'] != ''):
            $type = 'warning';
        endif;

        if (!empty($type)){
            $html = '<div class="alert alert-'.$type.' alert-dismissible" role="alert">';
            $html .= '<button type="button" class="close" data-dismiss="alert" aria-label="Fechar" title="Fechar"><span aria-hidden="true">&times;</span></button>';
            $html .= $_SESSION['msg']["$type"];
            $html .= '</div>';
            // Exclui a variavel
            unset($_SESSION['msg']["$type"]);
            echo $html;
        }
    }
    /**
     * Cria variável SESSION['msg'] de erro ou sucesso, conforme parâmetro $type
     * @param $type
     * @param $message
     * @param $url
     */
    public function setAlert($type, $message, $url = '') {
        $_SESSION['msg']["$type"] = $message;
        if (!empty($url)):
            header('Location: ' . URL . '/' . $url);
        endif;
    }
}