<?php

class PagesController {
  public function index(){

}

  public function show($slug){
    echo "User". $slug[0];
  }
}

