



	<a id="btn" class="android-btn" href="#"><img src="/index/qrcode" alt="安卓版下载" /></a>
	<div id="weixin-tip"><p><img src="/../img/live_weixin.png" alt="微信打开" style="width: 100%" /><span id="close" title="关闭" class="close">×</span></p></div>

<?php $this->beginBlock('style1'); ?>
<style>
	#weixin-tip{display:none;position:fixed;left:0;top:0;background:rgba(0,0,0,0.8);filter:alpha(opacity=80);width:100%;height:100%;z-index:100;}
	#weixin-tip p{text-align:center;margin-top:10%;padding:0 5%;position:relative;}
	/*#weixin-tip .close{color:#fff;padding:5px;font:bold 20px/24px simsun;text-shadow:0 1px 0 #ddd;position:absolute;top:0;left:5%;}*/
</style>
<?php $this->endBlock(); ?>
<?php $this->beginBlock('script'); ?>
<script>
	var is_weixin = (function(){return navigator.userAgent.toLowerCase().indexOf('micromessenger') !== -1})();
	
	$(function(){
		var winHeight = typeof window.innerHeight != 'undefined' ? window.innerHeight : document.documentElement.clientHeight; //兼容IOS，不需要的可以去掉
		if (1) {
			$(btn).on('click', function() {
				// $('#weixin-tip').css('height', winHeight + 'px'); //兼容IOS弹窗整屏
				$('#weixin-tip').css('display','block');
				$('#weixin-tip').show();
				return false;
			});
			$(close).on('click',function()  {
				$('#weixin-tip').hide();
			});
		}
	});
</script>
<?php $this->endBlock(); ?>

