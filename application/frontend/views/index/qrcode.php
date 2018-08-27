<?php
$vars = get_defined_vars ();
$data = $vars ['data'];
$content=Yii::app ()->request->hostInfo;
$matrixPointSize=6;
$matrixMarginSize=2;
$errorCorrectionLevel='M';
$tpgs='gif';
if(!empty($_POST)){
    $content=$_POST['content'];
    $matrixPointSize=$_POST['matrixPointSize'];
    $matrixMarginSize=$_POST['matrixMarginSize'];
    $errorCorrectionLevel=$_POST['errorCorrectionLevel'];
    $tpgs=$_POST['tpgs'];
}
 
$arrayCorrectionLevel=array('L'=>'L - Low (7%)','M'=>'M - Medium (15%)','Q'=>'Q - Quartile (25%)','H'=>'H - High (30%)');
$arrayTpgs=array('gif'=>'gif格式','png'=>'png格式','jpg格式');
?>
<div class="col-md-12">
    <div class="form-horizontal panel panel-default margin-t-10 b-img">
        <div class="panel-heading">
            <div class="pull-left">
                <span class="g-bg glyphicon glyphicon-wrench margin-r-2"
                    aria-hidden="true"></span>在线生成二维码
            </div>
            <div class="clearfix"></div>
        </div>
<?php
$form = $this->beginWidget ( 'CActiveForm', array (
        'id' => 'qrcode-form',
        'htmlOptions' => array (
                'id' => 'view_table',
                'class' => 'add-form padding-10',
                'enctype' => 'multipart/form-data'
        ),
        'enableAjaxValidation' => false
) );
?>
    <div class="form-group">
            <label class="col-lg-2 control-label">尺寸大小</label>
            <div class="col-lg-3">
                <select class="form-control" id="matrixPointSize"
                    name="matrixPointSize">
                    <?php for ($i=1;$i<21;$i++):?>
                        <option value="<?php echo $i;?>" <?php echo $i==$matrixPointSize?'selected':'';?>><?php echo $i;?></option>
                    <?php endfor;?>
                    </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">边距大小</label>
            <div class="col-lg-3">
                <select class="form-control" id="matrixMarginSize"
                    name="matrixMarginSize">
                    <?php for ($i=0;$i<21;$i++):?>
                        <option value="<?php echo $i;?>" <?php echo $i==$matrixMarginSize?'selected':'';?>><?php echo $i;?></option>
                    <?php endfor;?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">容错级别</label>
            <div class="col-lg-3">
            <?php echo CHtml::dropDownList('errorCorrectionLevel',$errorCorrectionLevel, $arrayCorrectionLevel,array('class'=>'form-control'));?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">保存格式</label>
            <div class="col-lg-3">
            <?php echo CHtml::dropDownList('tpgs',$tpgs, $arrayTpgs,array('class'=>'form-control'));?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">二维码内容</label>
            <div class="col-lg-5">
                <?php echo CHtml::textField('content',$content,array('class'=>'form-control','maxlength'=>150));?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">二维码logo图片</label>
            <div class="col-lg-5">
                <div class="col-md-6">
                        <input id="upimage" type="file" name="upimage" class="hidden">
                        <input id="tmp_file" class="form-control" type="text" value="gif，png，jpg">
                    </div>
                <div class="col-md-6"><a class="btn btn-default" onclick="$('input[id=upimage]').click();">选择文件</a></div>
            </div>
        </div>
        <div class="list_back">
            <input type="submit" value="生成二维码" class="btn btn-success">
        </div>
    </div>
<?php $this->endWidget(); ?>
    <div class="panel panel-default margin-t-10 b-img">
        <div class="panel-heading">
            <span class="g-bg glyphicon glyphicon-wrench margin-r-2" aria-hidden="true"></span>二维码
        </div>
        <div class="panel-body">
        <?php if(empty($_POST)):?>
        <?php echo CHtml::image('/static/tool/qrcode/qrcode.gif','二维码');?>
        <?php endif;?>
        <?php if(!empty($data['errors'])):?>
            <label class="col-lg-2 text-right">生成失败</label>
            <div class="col-lg-5">
            <?php foreach ($data['errors'] as $e):?>
            <?php echo $e;?><br>
            <?php endforeach;?>
            </div>
        <?php endif;?>
        <?php if(!empty($data['qrcode_path'])):?>
            <?php echo CHtml::image($data['qrcode_path'],'二维码');?>
            <a class="btn btn-success color-f" href="<?php echo $data['qrcode_path'];?>" target="_blank"><span aria-hidden="true" class="glyphicon glyphicon-download-alt margin-r-2"></span>右键另存为二维码</a>
        <?php endif;?>
        </div>
    </div>
<?php $this->renderPartial('/component/duoshuo_common');?>
</div>