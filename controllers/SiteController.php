<?php

namespace app\controllers;


use app\models\CourseSignup;
use app\models\Kurs;
use app\models\Proposal;
use app\models\Review;
use app\models\ReviewForm;
use app\models\SignupForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new CourseSignup();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->refresh();
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (Yii::$app->user->identity->isAdmin()) {
                return $this->redirect(['/admin']);
            }
            return $this->redirect(['site/index']);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->goBack();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionKurs()
    {
        $proposal = Proposal::find()->all();
        return $this->render('kurs', ['proposal' => $proposal]);
    }

    public function actionBiokurs()
    {
        return $this->render('biokurs');
    }

    public function actionKontakt()
    {
        $model = new ContactForm();

        // Если форма отправлена
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();  // Перезагружаем страницу
        }

        return $this->render('contact', [
            'model' => $model,  // Передаем модель в представление
        ]);
    }

    public function actionInfokurs($id)
    {
        $get_proposal = Proposal::findOne($id);
        $comments = Review::find()->where(['proposal_id' => $get_proposal->id])->andWhere(['status' => 2])->all();
        $model = new ReviewForm();
        if ($model->load(Yii::$app->request->post())) {
            $review = new Review();
            $review->user_id = Yii::$app->user->identity->id;
            $review->proposal_id = $get_proposal->id;
            $review->description = $model->description;
            $review->status = 1;
            $review->save();

            return $this->goBack();
        }
        $context = [
            'model' => $model,
            'get_proposal' => $get_proposal,
            'comments' => $comments,
        ];
        return $this->render('infokurs', $context);
    }

    public function actionForum()
    {
        return $this->render('forum');
    }

    public function actionProposal()
    {
        // Создаем новый объект модели для добавления нового предложения
        $model = new Proposal();

        // Получаем все предложения из базы данных
        $proposal = Proposal::find()->all();

        // Проверяем, если форма была отправлена
        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->session->setFlash('success', 'Отправлено');
            if (Yii::$app->request->isPost) {
                // Обрабатываем загрузку изображения
                $model->image = UploadedFile::getInstance($model, 'image');
                if ($model->upload()) {
                    $model->save(); // Сохраняем новое предложение
                    return $this->refresh(); // Обновляем страницу
                }
            }
        }



        // Передаем данные в представление
        return $this->render('proposal', [
            'model' => $model,     // Ссылка на модель для формы
            'proposal' => $proposal, // Список всех предложений
        ]);
    }


}
