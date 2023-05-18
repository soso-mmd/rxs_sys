
var hichat = false;
$(function(){
/* 點選回頂端
================================================== */
	$(".top").click(function(){
		$("html,body").animate({scrollTop:0},900);
		//$("html,body").animate({scrollTop:0},900,"easeOutBounce");
		return false;
	});
/* top判斷消失點
================================================== */
	$(".top").hide();
	$(window).scroll(function() {
	　　// Get the position of the current scroll.
	　　var top_position = $(window).scrollTop();

	　　if ( top_position > 200){
	　　　　// Let the item move with scrolling.
	　　　　$(".top").fadeIn();
			$(".nava-div").stop().animate({top: "0"}, 300);
	　　} else {
	　　　　// Reset the position to default.
	　　　　$(".top").fadeOut();
			$(".nava-div").fadeIn();
			$(".nava-div").stop().animate({top: "-100px"}, 300);
	　　}
	});
/* 搜尋小標符號\
================================================== */
	$(".gsc-search-button").attr('src', 'http://www.bystronic.com.tw/global/wGlobal/layout/images/fancy/zoom.png');

/* 調整footer間距\
================================================== */
	var wwidow = $(window).width();
	if(wwidow > 991){

		//console.log(wwidow);

		var vhight = $(".v-hight").height();

		$(".footer .item").css("height",vhight);
	}
});
function send(url,da,callback){
	$.ajax({
		type:'POST',
		url:url,
		data:da,
		success:callback,
		dataType:'json'
	});
}
function readFile(obj){ 
	try{
		var file = obj.files[0];  
		//判斷型別是不是圖片 
		if(!/image\/\w/.test(file.type)){ 
			alert("請確保檔案為影象型別"); 
			return false; 
		} 
		// cantDealImg(obj.id,e);
		// return;
		var reader = new FileReader(); 
		reader.readAsDataURL(file); 
		reader.onload = function(e){
			var da = {
				width:Number(imgPress)>0?Number(imgPress):500
			};
			dealImage(this.result,da,obj.id,function(url){
				$("#press_"+obj.id).val(url);
				if(hichat){
					hichat.saveImg();
				}
			});
		} 
	}catch(e){
		cantDealImg(obj.id,e);
	}
} 
function dealImage(path, obj, oid,callback){
	try{
		var img = new Image();
		img.src = path;
		img.onload = function(){
			try{
				var that = this;
				// 預設按比例壓縮
				var w = that.width,
				h = that.height,
				scale = w / h;
				w = obj.width || w;
				h = obj.height || (w / scale);
				var quality = 0.7; // 預設圖片質量為0.7
				//生成canvas
				var canvas = document.getElementById(oid+'_cv');
				var ctx = canvas.getContext('2d');
				// 建立屬性節點
				var anw = document.createAttribute("width");
				anw.nodeValue = w;
				var anh = document.createAttribute("height");
				anh.nodeValue = h;
				canvas.setAttributeNode(anw);
				canvas.setAttributeNode(anh);
				ctx.drawImage(that, 0, 0, w, h);
				// 影象質量
				if(obj.quality && obj.quality <= 1 && obj.quality > 0){
					quality = obj.quality;
				}
				// quality值越小，所繪製出的影象越模糊
				var dataURL=canvas.toDataURL('image/jpeg');
				callback(dataURL);
				$("#"+oid+'_cv').css('position','inherit');
			}catch(e){
				cantDealImg(oid,e);
			}
		}
	}catch(e){
		cantDealImg(oid,e);
	}
}
function cantDealImg(oid,e){
	var obj = document.getElementById(oid);
	var fileSize=0;
	if(obj.files[0].fileSize)fileSize=obj.files[0].fileSize;
	else if(obj.files[0].size)fileSize=obj.files[0].size;
	else if(navigator.userAgent.toLowerCase().match('msie'))fileSize = obj.fileSize;
	if(fileSize<2000000){
		var rid = oid.replace("file","");
		obj.setAttribute("name",rid);
	}else{
		$("#"+oid).val('');
		alert("圖片超過限定大小:2MB");
	}
	if(hichat){
		hichat.saveImg();
	}
}