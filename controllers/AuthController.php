<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 04.03.2018
 * Time: 17:10
 */

namespace app\controllers;


use Yii;
use yii\web\Controller;

class AuthController extends Controller
{
    public function actionLogin()
    {
        return $this->render('login');
    }

    /**
     * Logout action.
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}