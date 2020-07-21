<?php

namespace App\controllers;

use App\entities\User;
use App\repositories\GoodRepository;

class AuthController extends Controller
{

  public function loginAction()
  {
      //echo password_hash('123456', PASSWORD_DEFAULT);
      //$2y$10$lvC0V/8Hys8LQp.hSWC29ujbVwHeMm7fxP6wZRKLAbvZbDwer4SQi

      return $this->render('auth', ['menu' => $this->getMenu()]);
  }

  public function signAction() {
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $_SESSION['AUTH'] = [
            'user_login' => $_POST['user_login'],
            'user_password' => password_hash($_POST['user_password'], PASSWORD_DEFAULT)
          ];
      var_dump($_SESSION);
      echo password_verify('123456', '$2y$10$lvC0V/8Hys8LQp.hSWC29ujbVwHeMm7fxP6wZRKLAbvZbDwer4SQi');
      }

      $request = $this->app->request;

      echo $request->authService($request, 'User');

  }


}
