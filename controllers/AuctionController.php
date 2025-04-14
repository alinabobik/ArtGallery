<?php

namespace app\controllers;



use app\models\Auction;
use app\models\Bid;
use Yii;
use yii\web\NotFoundHttpException;

class AuctionController extends \yii\web\Controller {
    // Список аукционов
    public function actionIndex() {
        $activeAuctions = Auction::find()
            ->where(['status_id' => 1])
            ->andWhere(['>', 'end_time', date('Y-m-d H:i:s')])
            ->all();

        return $this->render('index', [
            'auctions' => $activeAuctions,
        ]);
    }

    // Детальная страница аукциона
    public function actionView($id) {
        $auction = Auction::findOne($id);
        if (!$auction) throw new NotFoundHttpException('Аукцион не найден.');

        $bidModel = new Bid();
        if ($bidModel->load(Yii::$app->request->post())) {
            $bidModel->user_id = Yii::$app->user->id;
            $bidModel->auction_id = $id;

            if ($bidModel->validate() && $bidModel->save()) {
                // Обновляем текущую ставку
                $auction->current_bid = $bidModel->amount;
                $auction->save();

                Yii::$app->session->setFlash('success', 'Ставка принята!');
                return $this->refresh();
            }
        }

        return $this->render('view', [
            'auction' => $auction,
            'bidModel' => $bidModel,
        ]);
    }
}