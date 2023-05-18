var chat_url = '/action/chatAjax';
var img_url = '/action/imgUp';
var ord_url = ctype==1?'/PHorder':'/RXmain';
$(function() {
	hichat = new HiChat();
	hichat.init();
});
function getmsg(o){
	var countTime = hichat.chatCount(o);
	setTimeout('getmsg()',countTime*1000);
}

function gerFullStr(n){
	n = Number(n)<10?'0'+n:n;
	return n;
}
var HiChat = function() {};
function getObjCount(obj){
	var c = 0;
	for(var i in obj){
		c++;
	}
	return c;
}
HiChat.prototype = {
	// online:false,
	friendList:[],
	talk:0,
	lastmsg:0,
	msglimit:100,
	rx:0,
	unreadAry:[],
	alys_key:[],
	sendAjax:function (data,callback){
		var that = this;
		$.ajax({
			url: chat_url,
			dataType: 'json',
			type: 'POST',
			data:data,
			error: function() {
				// that.online=false;
			},
			success: function (data){
				if(data)
					callback(data,that);
			}
		});
	},
	init: function() {
		if(chat_url=='' || chat_url == undefined) return;
		// $("#openHichat").bind("click",function(){that.openChat()});
		// $("#hideOff").bind("click",function(){that.hideOffLine()});
		// $("#hideSpan").css("display","none");
		getmsg(1);
	},
	handleMsg:function(res,that){
		if(res["f"])
			that.getFriendList(res["f"]);
		if(getObjCount(res["msg"])>0)
			that.showMsg(res["msg"]);
		if(res["rx"]){
			that.getOrd(res["rx"]);
		}
		if(res["ph"]){
			that.selTalk(res["ph"]);
		}
	},
	getOrd:function(ord){
		var html=[];
		html.push('<div class="ord">');
		html.push('<img src="/photo/rx_img/rx'+ord['oid']+'.jpg" class="ordImg"  onclick="location.href=\''+ord_url+'?rx='+ord.oid+'\';">');
		html.push('<div style="float:left;width:180px;" onclick="location.href=\''+ord_url+'?rx='+ord.oid+'\';">');
		html.push('<b >處方箋醫院:</b>');
		html.push('<p class="hpp">'+ord['hos']+'</p>');
		html.push('</div>');
		html.push('<div class="ordCls" onclick="hichat.clsOrd();">&#10006</div>');
		html.push('</div>');
		$("#ord_"+ord['act']).html(html.join(''));
		$("#historyMsg_"+ord['act']).css('height',420);
		this.selTalk(ord['act']);
		this.rx={
			oid:ord['oid'],
			act:ord['act']
		};
	},
	clsOrd:function(){
		if(this.rx!=0){
			$("#ord_"+this.rx.act).empty();
			$("#historyMsg_"+this.rx.act).css('height',480);
			this.rx=0;
		}
	},
	chatCount:function(o){
		da = {ac:'1',lmsg:this.lastmsg};
		if(o==1 && rx!=0)
			da['rx']=rx;
		if(o==1 && ph!=0)
			da['ph']=ph;
		this.sendAjax(da,this.handleMsg);
		var countTime = 10;
		if(this.talk!=0)
			countTime =3;
		return countTime;
	},
	hasReaded:function(){
		if(this.talk==0 || getObjCount(this.unreadAry[this.talk])==0)
			return;
		data={};
		data.ac = "3";
		data.act = this.talk;
		data.ids = this.unreadAry[this.talk];
		this.sendAjax(data,this.handleReaded);
	},
	handleReaded:function(res,that){
		if(res['rs']==1){
			that.unreadAry[res['act']] = [];
			$("#unread_"+res['act']).hide();
			$("#unread_"+res['act']).html(0);
			$("#munread_"+res['act']).hide();
			$("#munread_"+res['act']).html(0);
		}
	},
	saveMsg:function(img){
		if(this.talk==0){
			alert('請選擇聊天對象');
			return;
		}
		if(img==0){
			var msg = $("#messageInput_"+this.talk).val();
			var msg_type = 0;
		}else{
			var msg = img;
			var msg_type = 1;
		}
		msg = msg.replace(/^\s+|\s+$/gm,'');
		if(msg=='')return;
		var saveda={}
		/*if($("#"+'pas_'+this.talk).val() != ''){
			var now_key = $("#"+'pas_'+this.talk).val();
			msg_type += 2;
			msg = this._encryption(now_key,"pas@"+msg);
		}*/
		saveda['ac']='4';
		saveda['act']=this.talk;
		saveda['msg']=msg;
		saveda['msg_type']=msg_type;
		if(this.rx!=0){
			saveda['mrx']=this.rx['oid'];
			this.clsOrd();
		}
		$("#messageInput_"+this.talk).val('');
		this.sendAjax(saveda,this.handleSavmsg);
	},
	handleSavmsg:function(res,that){
		if(res["rs"]==1){
			that.handleMsg(res,that);
			// that.lastmsg = res["msg"][0]["id"];
		}
	},
	imgBtn:function(){
		if(this.talk==0){
			alert('請選擇聊天對象');
			return;
		}
		$("#imageFile_"+this.talk).click();
	},
	saveImg:function(obj){
		if($("input[name='img_"+this.talk+"']").val!=""){
			var that = this;
			$("#ajaxForm_"+this.talk).ajaxSubmit({
				success: function(res){
					var date = new Date();
					//console.log(res)
					res = res+'' ;
					if( res.indexOf('err') == -1)  { // 成功 將回傳圖檔名當成訊息傳送
						$('#imageFile_'+that.talk).val('');
						that.saveMsg(res);
					}else{
						alert('上传失败');
					}
				},
				timeout:10000
			});
		}
	},
	selTalk:function(act){
		$(".contentDiv").hide();
		$(".flist").removeClass("selflist");
		$(".mflist").removeClass("selflist");
		this.talk = act;
		$("#content_"+this.talk).show();
		$(".flist[key="+act+"]").addClass("selflist");
		$(".mflist[key="+act+"]").addClass("selflist");
		if(this.unreadAry[this.talk].length>0){
			var x = $("#"+this.talk+"_"+this.unreadAry[this.talk][0])[0].offsetTop;
			$("#historyMsg_"+this.talk).animate({scrollTop: x - 35},'fast');
			this.hasReaded();
		}else{
			$("#historyMsg_"+this.talk).animate({scrollTop: $("#historyMsg_"+this.talk)[0].scrollHeight},'fast');
		}
	},
	showMsg:function(da){
		var readedAry =[];
		for(var i in da){
			if(Number(da[i].id) <= this.lastmsg)continue;
			if(da[i].type==0)
				var act = da[i].dact;
			else
				var act = da[i].sact;
			$("#historyMsg_"+act).append(this.readMsg(da[i],act));
			
			if(Number(da[i].type)==1 && da[i].read==0){
				this.unreadAry[act].push(da[i].id);
				if(!(da[i].sact==this.talk)){
					$("#unread_"+act).html(this.unreadAry[act].length);
					$("#unread_"+act).show();
					$("#munread_"+act).html(this.unreadAry[act].length);
					$("#munread_"+act).show();
				}
			}
			this.lastmsg = da[i].id;
		}
		if(this.talk!=0){
			$("#historyMsg_"+this.talk).animate({scrollTop: $("#historyMsg_"+this.talk)[0].scrollHeight},'fast');
		}
		this.hasReaded();
	},
	readMsg:function(da,act){
		var html=[];
		switch(Number(da.type)){
			case 0:
				html.push('<div class="msg_div" style="text-align:right;" id="'+da.dact+'_'+da.id+'">');
				html.push('<div class="msg_my msg_'+act+'" data-msg="'+da.msg+'" data-type="'+da.msg_type+'">'+this.dealmsg(da.msg,da.msg_type,act)+'</div>');
				html.push('<div class="msg_time">'+da.time+'</div>');
				html.push('</div>');
				break;
			case 1:
				html.push('<div class="msg_div" id="'+da.sact+'_'+da.id+'">');
				html.push('<img class="chJpg" src='+this.friendList[da.sact].imgSrc+'>');
				html.push('<div class="msg_f msg_'+act+'" data-msg="'+da.msg+'" data-type="'+da.msg_type+'">'+this.dealmsg(da.msg,da.msg_type,act)+'</div>');
				html.push('<div class="msg_time_f">'+da.time+'</div>');
				html.push('</div>');
				break;
		}
		return html.join('');
	},
	dealmsg:function(msg,type,act){
		switch(Number(type)){
			case 0:
				return msg;
				break;
			case 1:
				return '<a href="photo/ms_img/'+msg+'" target="_blank"><img src="photo/ms_img/'+msg+'" style="max-width:180px;" onclick="window"></a>';
				break;
			case 2:
				mary = msg.split('_');
				var html = [];
				html.push('<a class="ord2" href="'+ord_url+'?rx='+mary[0]+'">');
				html.push('<img src="/photo/rx_img/rx'+mary[0]+'.jpg" class="ordImg">');
				html.push('<div style="float:left;width:140px;">');
				html.push('<b style="padding-left:5px;color: #9fa2a5;font-size: 9pt;">處方箋醫院:</b>');
				html.push('<p class="ordp" >'+mary[1]+'</p>');
				html.push('</div>');
				html.push('</a>');
				return html.join('');
				break;
		}
	},
	getFriendList:function(data){
		var noup = true;
		for(var f in data){
			if(!this.friendList[f]){
				this.friendList[f]=data[f];
				noup = false;
			}else if(this.friendList[f]['lastmsg'] != data[f]['lastmsg']){
				this.friendList[f]['lastmsg']=data[f]['lastmsg'];
				noup = false;
			}
		}
		if(noup) return;
		var sortF = [];
		for(var f in this.friendList){
			this.friendList[f].act = f;
			sortF.push(this.friendList[f]);
		}
		sortF=sortF.sort(function (a, b) {
			return a.lastmsg < b.lastmsg ? 1 : -1;
		});
		var html = [];
		var mhtml = [];
		for(var f in sortF){
			if(!this.unreadAry[sortF[f].act])
				this.unreadAry[sortF[f].act]=[];
			var selclass = '';
			if(this.talk == sortF[f].act)
				selclass = 'selflist';
			var src='';
			if(sortF[f]['type']==1)
				src='photo/ph_img/img'+sortF[f]['id']+'_photo.jpg';
			else
				src='/resource/img/acc.jpg';
			this.friendList[sortF[f].act].imgSrc = src;
			
			html.push('<div class="flist '+selclass+'" key="'+sortF[f].act+'" >');
			html.push('<img class="lineJpg" src="'+src+'">');
			html.push('&nbsp;&nbsp;');
			html.push(sortF[f].name);
			html.push('<div class="unread" id="unread_'+sortF[f].act+'">0</div></div>');
			
			mhtml.push('<div class="mflist '+selclass+'" key="'+sortF[f].act+'" >');
			mhtml.push('<img class="mlineJpg" src="'+src+'">');
			mhtml.push('<p class="fpp">'+sortF[f].name+'</p>');
			mhtml.push('<div class="munread" id="munread_'+sortF[f].act+'">0</div></div>');
			
			
			
			if(!$("#content_"+sortF[f].act).html()){
				var content_html = $("#chat_content").text();
				content_html = content_html.replace(/string@/g,''),
				content_html = content_html.replace(/@act/g,sortF[f].act),
				content_html = content_html.replace(/@src/g,src),
				content_html = content_html.replace(/@tname/g,sortF[f].name),
				$("#wrapper").append(content_html);
				$("#strlen_"+sortF[f].act).html(this.msglimit);
			}
		}
		$("#clist").html(html.join(''));
		$("#mclist").html(mhtml.join(''));
		var that = this;
		$(".flist, .mflist").bind("click",function(){
			that.selTalk($(this).attr('key'));
		});
		$(".sendBtn").bind("click",function(){that.saveMsg(0)});
		$('.messageInput').bind("keyup",function(event){
			var code = event.keyCode||event.which;
			that.countMsgLength(code,$(this));
		});
		$(".sendImg").bind("click",function(){that.imgBtn()});
		// $("input[name='imagefile']").bind("change",function(){that.saveImg(this);});
		$(".ajaxForm").attr("action",img_url);
	},
	countMsgLength:function(code,obj){
		var act = obj.attr("id").split('_');
		act = act[1];
		var msg = obj.val();
		var rlength = Number(this.msglimit) - Number(msg.length);
		if(rlength < 0){
			msg = msg.substring(0,this.msglimit);
			obj.val(msg);
			$("#strlen_"+act).html(0);
		}else{
			$("#strlen_"+act).html(rlength);
		}
		switch(Number(code)){
			case 13:
				// console.log(obj.text());
				this.saveMsg(0);
				break;
			case 27:
				obj.val('');
				$("#strlen_"+act).html(this.msglimit);
				break;
		}
			
	},
	/*_displayNewMsg: function(user, msg, color, des, tim) {
		ckmsg = msg.split(':');
		if ((document.getElementById('pas').value != "") && ( ckmsg.length == 2)){
			msg = this._Decrypted(document.getElementById('pas').value,msg);
		}else if ( ckmsg.length == 2 ){
			msg = "(加密訊息)";
		}
		var container = document.getElementById('historyMsg'),
            msgToDisplay = document.createElement('p'),
            date = new Date().toTimeString().substr(0, 8),
            //determine whether the msg contains emoji
            msg = this._showEmoji(msg);
		if ((des == "") || (des == undefined)){
			des = 'ALL';
		}
		if ((tim == "") || (tim == undefined)){
			var dd = date;
		}else{
			var dd = tim;
		}
        msgToDisplay.style.color = color || '#000';
		if ( user == 'me' ){
			msgToDisplay.style.textAlign = 'right';
			msgToDisplay.innerHTML = '<span class="timespan">(' + dd + '): </span>' + msg;
		}else{
			msgToDisplay.innerHTML = msg +'<span class="timespan">(' + dd + '): </span>' ;
		}
        container.appendChild(msgToDisplay);
        container.scrollTop = container.scrollHeight;
    },
    _displayImage: function(user, imgData, color) {
        var container = document.getElementById('historyMsg'),
            msgToDisplay = document.createElement('p'),
            date = new Date().toTimeString().substr(0, 8);
        msgToDisplay.style.color = color || '#000';
        msgToDisplay.innerHTML = user + '<span class="timespan">(' + date + '): </span> <br/>' + '<a href="' + imgData + '" target="_blank"><img src="' + imgData + '"/></a>';
        container.appendChild(msgToDisplay);
        container.scrollTop = container.scrollHeight;
    },
    _showEmoji: function(msg) {
        var match, result = msg,
            reg = /\[emoji:\d+\]/g,
            emojiIndex,
            totalEmojiNum = document.getElementById('emojiWrapper').children.length;
        while (match = reg.exec(msg)) {
            emojiIndex = match[0].slice(7, -1);
            if (emojiIndex > totalEmojiNum) {
                result = result.replace(match[0], '[X]');
            } else {
             //   result = result.replace(match[0], '<img class="emoji" src="../content/emoji/' + emojiIndex + '.gif" />');//todo:fix this in chrome it will cause a new request for the image
            };
        };
        return result;
    },
	_mixkey: function(key) {
		var key_256 = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15,
				   16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28,
				   29, 30, 31];
		var dfkey = aesjs.utils.utf8.toBytes(key);
		dfkey_array = Array.from(dfkey);
		
		var all_key = dfkey_array.concat(key_256);
		all_key.length = 32;
		return all_key;
	},
	_encryption: function(key, msg) {
		key = this._mixkey(key);
		var textBytes = aesjs.utils.utf8.toBytes(msg);
		var aesCtr = new aesjs.ModeOfOperation.ctr(key, new aesjs.Counter(5));
		var encryptedBytes = aesCtr.encrypt(textBytes);
		var encryptedHex = aesjs.utils.hex.fromBytes(encryptedBytes);
		encryptedHex = '@:' + encryptedHex;
        return encryptedHex;
    },
	_Decrypted: function(key, msg) {
		key = this._mixkey(key);
		var ckmsg = Array();
		ckmsg = msg.split(':');
		if ( ckmsg.length == 2){
		var encryptedBytes = aesjs.utils.hex.toBytes(ckmsg[1]);
		var aesCtr = new aesjs.ModeOfOperation.ctr(key, new aesjs.Counter(5));
		var decryptedBytes = aesCtr.decrypt(encryptedBytes);
		var decryptedText = aesjs.utils.utf8.fromBytes(decryptedBytes);
		msg = decryptedText;
		}
        return msg;
    }*/
}