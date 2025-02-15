<?php
class VueJSController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {   

        $myapi['data'] = [
            [
                "idLogin" => 2400,
                "login" => "super",
                "nomeUsuario" => "super Usuário",
                "email" => "super@admin.com",
            ],
            [
                "idLogin" => 6963,
                "login" => "gestorUsuario",
                "nomeUsuario" => "Gestor de Usuarios Example",
                "email" => "super@admin.com",
            ],
            [
                "idLogin" => 6964,
                "login" => "gestorGrupo",
                "nomeUsuario" => "gestorGrupo",
                "email" => "super@admin.com",
            ],
            [
                "idLogin" => 6964,
                "login" => "Iron Main",
                "nomeUsuario" => "Iron Main",
                "email" => "super@admin.com",
            ],
            [
                "idLogin" => 6964,
                "login" => " Y",
                "nomeUsuario" => "Black",
                "email" => "super@admin.com",
            ]
        ];

        $this->loadTemplate('vuejs', $myapi);   
        exit;
    } 


    public function minhaAPI_Testes(): void {   
        $data = [
            [
                "idLogin" => 2400,
                "login" => "super",
                "nomeUsuario" => "super Usuário",
                "email" => "super@admin.com",
                "senha" => "1e5213b7cbc4d1780f09770123097879",
                "validade" => "2025-02-27",               
            ],
            [
                "idLogin" => 6963,
                "login" => "gestorUsuario",
                "nomeUsuario" => "Gestor de Usuarios Example",
                "email" => "super@admin.com",
                "senha" => "1e5213b7cbc4d1780f09770123097879",
                "validade" => "2025-02-27",               
            ],
            [
                "idLogin" => 6964,
                "login" => "gestorGrupo",
                "nomeUsuario" => "gestorGrupo",
                "email" => "super@admin.com",
                "senha" => "1e5213b7cbc4d1780f09770123097879",
                "validade" => "2025-02-27",                
            ],
            [
                "idLogin" => 6964,
                "login" => "Iron Main",
                "nomeUsuario" => "Iron Main",
                "email" => "super@admin.com",
                "senha" => "1e5213b7cbc4d1780f09770123097879",
                "validade" => "2025-02-27",                
            ],
            [
                "idLogin" => 6964,
                "login" => " Y",
                "nomeUsuario" => "Black",
                "email" => "super@admin.com",
                "senha" => "1e5213b7cbc4d1780f09770123097879",
                "validade" => "2025-02-27",               
            ]
        ];
        
       echo json_encode([
        'ok' => true,
        'data'=> $data
       ]);    
    }
}