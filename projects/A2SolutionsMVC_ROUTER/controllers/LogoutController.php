<?php
class LogoutController extends RenderView {
    public function index(){     

      $this->loadView('logout', []);
    }
}