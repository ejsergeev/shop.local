<?php

namespace App\controllers;

use App\entities\Order;
use App\repositories\OrderRepository;

class OrderController extends Controller
{



  public function addAction(){
    return $this->render('order', ['menu' => $this->getMenu()]);
  }

  public function Action()
  {


      $request = $this->app->request;
      $orderRepository = $this->getRepository('Order');
      $hasAdd = $this->app->orderService->add($request, $orderRepository);

      if (!$hasAdd) {
          return $this->render('404');
      }

      header('location: /gbphp/good/all');
  }
}
