<?php

$routes = [
  '/' =>  'HomeController@index',
  '/users/{id}' =>  'PagesController@show',
  '/dashboard' =>  'DashboardController@index',
  '/logout' =>  'LogoutController@index',
  '/user/login' =>  'UserController@login', // Add this line
];