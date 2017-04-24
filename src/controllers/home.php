<?php
namespace Controllers;

class Home {
  public static function index()
  {
    \Flight::render('welcome');
  }
}