<?php
class DashboardController extends RenderView {
    public function index(){   
      
      $cars = new CarModel();
      //$totalPatrimonio = $carController->somarValores();

     $totalPatrimonio = $cars->sumCarValues();
     $formattedValue = number_format($totalPatrimonio, 2, ',', '.');

      $this->loadView('dashboard', [
        'cars' => $cars->getAllCars(),
       'formattedValue' => $formattedValue
      ]);
    }
}