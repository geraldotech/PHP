<?php
class FooController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index():void {   

    $myapi['data'] = [
            [
                "idLogin" => 2400,
                "login" => "super",
                "nomeUsuario" => "super Usuário",
                "email" => "super@admin.com",
                "senha" => "1e5213b7cbc4d1780f09770123097879",
                "validade" => "2025-02-27",
                "idTotovs" => null,
                "trocaSenha" => 0,
                "validadeSenha" => "2025-02-27",
                "token" => null,
                "gestorUsuario" => "S",
                "gestorGrupo" => "S",
                "gestorPrograma" => "S",
            ],
            [
                "idLogin" => 6963,
                "login" => "gestorUsuario",
                "nomeUsuario" => "Gestor de Usuarios Example",
                "email" => "super@admin.com",
                "senha" => "1e5213b7cbc4d1780f09770123097879",
                "validade" => "2025-02-27",
                "idTotovs" => null,
                "trocaSenha" => 0,
                "validadeSenha" => "2025-02-27",
                "token" => null,
                "gestorUsuario" => "S",
                "gestorGrupo" => "N",
                "gestorPrograma" => "N",
            ],
            [
                "idLogin" => 6964,
                "login" => "gestorGrupo",
                "nomeUsuario" => "gestorGrupo",
                "email" => "super@admin.com",
                "senha" => "1e5213b7cbc4d1780f09770123097879",
                "validade" => "2025-02-27",
                "idTotovs" => null,
                "trocaSenha" => 0,
                "validadeSenha" => "2025-02-27",
                "token" => null,
                "gestorUsuario" => "N",
            ],
            [
                "idLogin" => 6964,
                "login" => "Iron Main",
                "nomeUsuario" => "Iron Main",
                "email" => "super@admin.com",
                "senha" => "1e5213b7cbc4d1780f09770123097879",
                "validade" => "2025-02-27",
                "idTotovs" => null,
                "trocaSenha" => 0,
                "validadeSenha" => "2025-02-27",
                "token" => null,
                "gestorUsuario" => "N",
            ],
            [
                "idLogin" => 6964,
                "login" => " Y",
                "nomeUsuario" => "Black",
                "email" => "super@admin.com",
                "senha" => "1e5213b7cbc4d1780f09770123097879",
                "validade" => "2025-02-27",
                "idTotovs" => null,
                "trocaSenha" => 0,
                "validadeSenha" => "2025-02-27",
                "token" => null,
                "gestorUsuario" => "N",
            ]
        ];
        

        $this->loadTemplate('foo', $myapi);   
        exit;
    }

    public function minhaAPI_Testes() {   
        $data = [
            [
                "idLogin" => 2400,
                "login" => "super",
                "nomeUsuario" => "super Usuário",
                "email" => "super@admin.com",
                "senha" => "1e5213b7cbc4d1780f09770123097879",
                "validade" => "2025-02-27",
                "idTotovs" => null,
                "trocaSenha" => 0,
                "validadeSenha" => "2025-02-27",
                "token" => null,
                "gestorUsuario" => "S",
                "gestorGrupo" => "S",
                "gestorPrograma" => "S",
            ],
            [
                "idLogin" => 6963,
                "login" => "gestorUsuario",
                "nomeUsuario" => "Gestor de Usuarios Example",
                "email" => "super@admin.com",
                "senha" => "1e5213b7cbc4d1780f09770123097879",
                "validade" => "2025-02-27",
                "idTotovs" => null,
                "trocaSenha" => 0,
                "validadeSenha" => "2025-02-27",
                "token" => null,
                "gestorUsuario" => "S",
                "gestorGrupo" => "N",
                "gestorPrograma" => "N",
            ],
            [
                "idLogin" => 6964,
                "login" => "gestorGrupo",
                "nomeUsuario" => "gestorGrupo",
                "email" => "super@admin.com",
                "senha" => "1e5213b7cbc4d1780f09770123097879",
                "validade" => "2025-02-27",
                "idTotovs" => null,
                "trocaSenha" => 0,
                "validadeSenha" => "2025-02-27",
                "token" => null,
                "gestorUsuario" => "N",
            ],
            [
                "idLogin" => 6964,
                "login" => "Iron Main",
                "nomeUsuario" => "Iron Main",
                "email" => "super@admin.com",
                "senha" => "1e5213b7cbc4d1780f09770123097879",
                "validade" => "2025-02-27",
                "idTotovs" => null,
                "trocaSenha" => 0,
                "validadeSenha" => "2025-02-27",
                "token" => null,
                "gestorUsuario" => "N",
            ],
            [
                "idLogin" => 6964,
                "login" => " Y",
                "nomeUsuario" => "Black",
                "email" => "super@admin.com",
                "senha" => "1e5213b7cbc4d1780f09770123097879",
                "validade" => "2025-02-27",
                "idTotovs" => null,
                "trocaSenha" => 0,
                "validadeSenha" => "2025-02-27",
                "token" => null,
                "gestorUsuario" => "N",
            ]
        ];
        
        echo json_encode($data);
    }

 

}