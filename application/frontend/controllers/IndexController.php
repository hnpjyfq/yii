<?php
namespace frontend\controllers;

use yii;
use yii\web\Controller;
use dosamigos\qrcode\QrCode;
use dosamigos\qrcode\formats\MailTo;
use app\models\User;
/**
* 
*/
class IndexController extends Controller
{
	public $layout = 'common';
	function actionIndex()
	{
		$request = \YII::$app->request;
		// print_r($request->userIP);die;
		$sql = 'select * from user where id=1';
		$res = User::findBySql($sql)->all();
		// print_r($res);die;
		return $this->render('index',array('name'=>'root1'));
	}
	function actionLogin()
	{
		return $this->render('login');
	}
	public function actionQrcode()
	{
		$request = \YII::$app->request;
		$str = $request->get('str', 'http://y.btegyii.bingtuanwang.com/index/hint');
        return QrCode::png($str); 
	}
	public function actionHint()
	{
       return $this->render('hint');
	}
	public function actionQc()
	{
		
        return $this->render('qrcode');
	}
	public function actionPiano()
	{
		
        return $this->renderPartial('piano');
	}
}