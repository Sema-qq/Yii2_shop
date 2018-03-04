<?php
/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 04.03.2018
 * Time: 17:10
 */

namespace app\controllers;


use app\models\LoginForm;
use app\models\SignupForm;
use Yii;
use yii\web\Controller;

class AuthController extends Controller
{
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $login = new LoginForm();
        if ($login->load(Yii::$app->request->post()) && $login->login()) {
            return $this->goBack();
        }

        $signup = new SignupForm();
        if ($signup->load(Yii::$app->request->post()) && $signup->signup()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'login' => $login,
            'signup' => $signup
        ]);
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