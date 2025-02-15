<?php
class HomeController extends RenderView {
    public function index(){
       // echo '<h1>Home</h1>';
       $this->loadView('login', ['title' => 'Fazer Login']);       
    }
}