<?php
class HomeController extends RenderView {
    public function index(){
       // echo '<h1>Home</h1>';
       $this->loadView('home', ['title' => 'Fazer Login']);       
    }
}