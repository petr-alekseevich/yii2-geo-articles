<?php

namespace app\controllers;

use app\models\LoginForm;
use app\models\SignupForm;
use app\models\User;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class AuthController extends Controller
{
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $data = Yii::$app->request->post();
        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post())) {
            $user = User::findByEmail($data['LoginForm']['email']);

            if (Yii::$app->security->validatePassword($data['LoginForm']['password'], $user->password)){
                $identity = User::findIdentity($user->id);

                /* Логиним пользователя и возвращаем его на ту же страницу */
                if (Yii::$app->user->login($identity, 3600 * 24 * 365)) {
                    return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
                }
            }

        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout(): Response
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function actionSignup()
    {
        $model = new SignupForm();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());

            if ($model->signup()) {
                return $this->redirect(['auth/login']);
            }
        }

        return $this->render('signup', ['model' => $model]);
    }

    public function actionLoginVk($uid, $first_name, $photo)
    {
        $user = new User();
        if ($user->saveFromVk($uid, $first_name, $photo)) {
            return $this->redirect(['site/index']);
        }
    }

    public function actionTest()
    {
        $user = User::findOne(1);

        Yii::$app->user->logout();

        if (Yii::$app->user->isGuest) {
            echo 'Пользователь гость';
        } else {
            echo 'Пользователь Авторизован';
        }
    }
}