<?php
namespace frontend\controllers;

use yii;
use yii\web\Controller;
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
		return $this->render('index',array('name'=>'root1'));
	}
	function actionLogin()
	{
		return $this->render('login');
	}
	public function actionQrcode(){
		// Yii::$enableIncludePath = false;
// Yii::import('application.extensions.phpqrcode.phpqrcode', 1 );
		$this->breadcrumbs=array_merge($this->breadcrumbs,array(
				'生成二维码'
		));
		$qrcode_path='';
		$file_tmp_name='';
		$errors=array();
		if(!empty($_POST)){
			$content = trim($_POST['content']); //二维码内容
			$contentSize=$this->getStringLength($content);
			if($contentSize>290){
				$errors[]='字数过长，不能多于150个字符！';
			}
			Yii::$enableIncludePath = false;
			Yii::import ('application.extensions.phpqrcode.phpqrcode', 1 );
			if(isset($_FILES['upimage']['tmp_name']) && $_FILES['upimage']['tmp_name'] && is_uploaded_file($_FILES['upimage']['tmp_name'])){
				if($_FILES['upimage']['size']>512000){
					$errors[]="你上传的文件过大，最大不能超过500K。";
				}
				$file_tmp_name=$_FILES['upimage']['tmp_name'];
				$fileext = array("image/pjpeg","image/jpeg","image/gif","image/x-png","image/png");
				if(!in_array($_FILES['upimage']['type'],$fileext)){
					$errors[]="你上传的文件格式不正确，仅支持 png, jpg, gif格式。";
				}
			}
			$tpgs=$_POST['tpgs'];//图片格式
			$bas_path=dirname ( Yii::app ()->BasePath );
			$qrcode_bas_path=$bas_path.'/upload/qrcode/';
			if(!is_dir($qrcode_bas_path)){
				mkdir($qrcode_bas_path, 0777, true);
			}
			$uniqid_rand=date("Ymdhis").uniqid(). rand(1,1000);
			$qrcode_path=$qrcode_bas_path.$uniqid_rand. "_1.".$tpgs;
			$qrcode_path_new=$qrcode_bas_path.$uniqid_rand."_2.".$tpgs;
			if(Helper::getOS()=='Linux'){

				$mv = move_uploaded_file($file_tmp_name, $qrcode_path);
			}else{
				//解决windows下中文文件名乱码的问题
				$save_path = Helper::safeEncoding($qrcode_path,'GB2312');
				if(!$save_path){
					$errors[]='上传失败，请重试！';
				}
				$mv = move_uploaded_file($file_tmp_name, $qrcode_path);
			}
			if(empty($errors)){
				$errorCorrectionLevel = $_POST['errorCorrectionLevel'];//容错级别
				$matrixPointSize = $_POST['matrixPointSize'];//生成图片大小
				$matrixMarginSize = $_POST['matrixMarginSize'];//边距大小
				//生成二维码图片
				QRcode::png($content,$qrcode_path_new, $errorCorrectionLevel, $matrixPointSize, $matrixMarginSize);
				$QR = $qrcode_path_new;//已经生成的原始二维码图
				$logo = $qrcode_path;//准备好的logo图片
				if (file_exists($logo)) {
					$QR = imagecreatefromstring(file_get_contents($QR));
					$logo = imagecreatefromstring(file_get_contents($logo));
					$QR_width = imagesx($QR);//二维码图片宽度
					$QR_height = imagesy($QR);//二维码图片高度
					$logo_width = imagesx($logo);//logo图片宽度
					$logo_height = imagesy($logo);//logo图片高度
					$logo_qr_width = $QR_width / 5;
					$scale = $logo_width/$logo_qr_width;
					$logo_qr_height = $logo_height/$scale;
					$from_width = ($QR_width - $logo_qr_width) / 2;
					//重新组合图片并调整大小
					imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,
					$logo_qr_height, $logo_width, $logo_height);
					//输出图片
		//                  header("Content-type: image/png");
					imagepng($QR,$qrcode_path);
					imagedestroy($QR);
				}else{
					$qrcode_path=$qrcode_path_new;
				}
				$qrcode_path=str_replace($bas_path,'', $qrcode_path);
			}else{
				$qrcode_path='';
			}
		}
		$data=array('data'=>array('errors'=>$errors,'qrcode_path'=>$qrcode_path));
		$this->renderPartial( 'qrcode',$data);
	}
}