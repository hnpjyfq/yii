<!DOCTYPE html>
<html>
<head>
<!-- 	<EMBED src="http://fs.w.kugou.com/201711281356/72cb04345fca2c8a7179838f6280fdfd/G016/M08/13/15/UA0DAFVgVCSABvdXADuZJPZwWhI142.mp3" autostart="true" loop="true" width="0" height="0">  -->
	<meta charset="GB2312">
    <title></title>
    <script src="http://cdn.static.runoob.com/libs/jquery/1.10.2/jquery.min.js" ></script>
    <script src="http://demo.sc.chinaz.com//Files/DownLoad/webjs1/201312/jiaoben1766/js/zzsc.js"></script>
    <style type="text/css">
    	.active{
    		background-color: #444444;
    	}
    	.radius{
    		border-radius: 10px;
    	}
    	.divb{
    		width: 80%;
    		height: 80%;
    		position: fixed;
    		box-shadow:8px 8px 17px #aaa;
    		top:10%;
    		left:10%;
    		z-index: 100;
    		background-color: #444444;
    	}
    	/*.divb div{
    		display: inline-block;
    	}*/
    	.divb div div{
    		display: inline-block;
    		clear: both;
    		width: 12%;
    		height: 90%;
    		background-color: white;
    		/*box-shadow: -2px 2px 4px #aaaaaa;*/
    		border: none;
    		border-bottom-left-radius:8px;
    		border-bottom-right-radius:8px;
    		background-image: -webkit-gradient(linear,0 0,0 60%,from(#444),to(#aaa));
    	}
    </style>
</head>
<body>
<!-- 	<EMBED src="http://fs.w.kugou.com/201711281356/72cb04345fca2c8a7179838f6280fdfd/G016/M08/13/15/UA0DAFVgVCSABvdXADuZJPZwWhI142.mp3" autostart="true" loop="true" width="0" height="0" volume="10">  -->
		<audio class="music" id="myAudio" src="http://fs.w.kugou.com/201711291726/aad0f6b739636432e3dec7c6467cd0a5/G010/M05/15/13/Sg0DAFUPGX-AFKqZADw5JZRVYmU930.mp3" preload="auto" >
            <!-- <p class="myAudiohide">你的浏览器不支持<code>audio</code>标签.</p> -->
        </audio>
	<div class="divb radius">
		<div class="radius" style="margin-left: 5%;width: 89%;height: 90%;margin-top: 1%;background-color: white;text-align: center;">	
			<!-- <font class="bac" style="font-size: 40em;line-height: 130%;
    top: 14rem;
    left: 14rem;text-shadow: red 0px 0px 130px;color: pink;opacity: 0.8">&#10084</font> -->
		</div>
		<div class="key" style="margin-top: 0px;width: 90%;height: 10%;margin-left: 10%;border-style: none;">
			<div id="key60">
				a
			</div>
			<div id="key62">
				s
			</div>
			<div id="key64">
				d
			</div>
			<div id="key65">
				f
			</div>
			<div id="key67">
				g
			</div>
			<div id="key69">
				h
			</div>
			<div id="key71">
				j
			</div>
	<!-- 		<div id="key72">
			</div> -->
<!-- 			<div id="key61">
			</div>
			<div id="key63">
			</div>
			<div id="key66">
			</div>
			<div id="key68">
			</div>
			<div id="key70">
			</div> -->
		</div>
	</div>
	<script>
		$(function(){
        	$('font').click(function(){
	        	autorun();
	        	Media = document.getElementById('myAudio').play();
	        	Media.volume = 20; 
	        	// setInterval("changeColor()",200);
        	});
        });
		$('div[id*=key]').mousedown(function(){
			obj = $(this);
			var color="red|#FF00FF|#CC0000|#990066|#FF6600|#FF99CC|#FFC125|#EEA2AD|#E0FFFF|#B0E2FF"; 
			color=color.split("|"); 
			$('.bac').fadeIn('100'); 
	        cc = color[parseInt(Math.random() * color.length)];
	        $('.bac').css('color',cc);
	        // $('.bac').fadeOut('100');
			$(this).css('background-image','-webkit-gradient(linear,0 0,0 60%,from(white),to(#bbb))');
			setTimeout(function(){
				obj.css('background-image','-webkit-gradient(linear,0 0,0 60%,from(#444),to(#aaa))');
			},100);
		});
		// $('div[id*=key]').mouseup(function(){
		// 	$(this).css('background-image','-webkit-gradient(linear,0 0,0 60%,from(#444),to(#aaa))');
		// });
		// $(window)div[id*=key]down(function(event){
		//   $("div").html("Key: " + event.which);
		// });
		function changeColor(){ 
	        var color="|#CC0000|#990066|#FF6600|#FF99CC"; 
	        // var icon ="|&#10048|&#10084|&#10084"; //"|&#10052|&#10048|&#9733|&#10084|&#10084";
	        color=color.split("|"); //|#FF00FF|#CC0000|#990066|#FF6600|#FF99CC
	        // icon=icon.split("|"); //|#FF00FF|#CC0000|#990066|#FF6600|#FF99CC
	        $('.bac').fadeOut('100');
	        cc = color[parseInt(Math.random() * color.length)];
	        // ic = icon[parseInt(Math.random() * icon.length)];
	        // $('.bac').html(ic); 
	        $('.bac').css('color',cc).css('font-size','30em'); 
	        // $('.label-info').css('color',color[parseInt(Math.random() * color.length)]); 
	        // $('.bac').css('box-shadow','3px 3px 2px '+cc); 
	        // $('.label-info').css('color',color[parseInt(Math.random() * color.length)]); 
	        $('.bac').fadeIn('50');
	        $('.bac').css('font-size','40em'); 
    	} 
        

        function autorun(){
        	var arr = [1,1,5,5,6,6,5,0,4,4,3,3,2,2,1,0,5,5,4,4,3,3,2,0,5,5,4,4,3,3,2];
        	// var arr = [0,0,5,5,6,5,1,7,5,5,6,5,2,1,5,5,5,3,1,7,6,4,4,3,1,2,1];
        	$.each(arr,function(index,data){
        		if(data==0){
        			$('.bac').fadeOut('30');
        			// $('.bac').fadeIn('fast',function(){
	        		// 	if(data!=0){
	        		// 		$('div[id*=key]').eq(data-1).click();
	        		// 	}
        			// });
        		}else{
        			$('.bac').fadeOut('20');
        			$('.bac').fadeIn('20',function(){
	        			if(data!=0){
	        				changeColor();
	        				// $('div[id*=key]').eq(data-1).click();
	        				// changeColor();
	        			}
        			});
        		}
        	});
        }

	</script>
</body>
</html>