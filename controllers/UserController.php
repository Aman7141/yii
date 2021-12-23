<?php

namespace app\controllers;

use Yii;
use Yii\web\Controller;
use app\models\User;

class UserController extends \yii\web\Controller
{
    public function actionLogin()
    {
      // // Create Query
      // $query = Job::find();
      //
      // $categories = $query->
      //   return $this->render('login');
    }

    public function actionRegister()
    {
      $user = new User();

      if ($user->load(Yii::$app->request->post())) {
        if ($user->validate()) {
            // form inputs are valid, do something here
            return;
          }
        }

        return $this->render('register', [
          'user' => $user,
        ]);
      }

}
