<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
	<title>快捷文章发表框</title>
<link rel="StyleSheet" href="__PUBLIC__/Css/editor/base.css">
<script type="text/javascript" src="__PUBLIC__/Js/editor/editor.js"></script>
<script type="text/javascript">
var guid = "1324481743" ;
var sState = "iframe";
var checkEdit;

function save_article(){
	et.save();
	if(exist('editor_body_textarea')){
		setCopy($('editor_body_textarea').value);
	}else if(exist('editor_body_area')){
		setCopy($('editor_body_area').value);
	}
}
//文章预览
function article_preview(){
	if (check_editor()){
		var editor_win = window.open('', "_blank", '');
			editor_win.document.open('text/html', 'replace');
			editor_win.opener = null 
			editor_win.document.writeln($('editor_body_textarea').value);
			editor_win.document.close();
		}
}
function check_editor(){
	var err_msg = '请先输入文章内容';
	if ($('editor_body_textarea').value.toLowerCase() =="<div>&nbsp;</div>" ||$('editor_body_textarea').value ==""){ 
		alert(err_msg);
		return false;
	}
	else if($('editor_body_textarea').value.toLowerCase() =="<p>&nbsp;</p>" ||$('editor_body_textarea').value ==""){ 
		alert(err_msg);
		return false;
	}
	else
		return true;
}

function LoadContent(ContentID){
if (typeof(EDiaryEditor.iframe)=="object"){
eval("EDiaryEditor.iframe.contentWindow.document.body.innerHTML=window.parent.document.getElementById('"+ContentID+"').value;");
eval("setInterval(\"SaveContent('"+ContentID+"')\",500)");
}else{
eval("setTimeout(\"LoadContent('"+ContentID+"')\",200)");
}
}

function SaveContent(ContentID){
if($('editor_body_textarea').value!=EDiaryEditor.iframe.contentWindow.document.body.innerHTML){
    if(editor_body_textarea.style.display=="none"){
	   $('editor_body_textarea').value=EDiaryEditor.iframe.contentWindow.document.body.innerHTML
	}else{
	   EDiaryEditor.iframe.contentWindow.document.body.innerHTML=$('editor_body_textarea').value
	}
}
if(eval("window.parent.document.getElementById('"+ContentID+"').value!=EDiaryEditor.iframe.contentWindow.document.body.innerHTML;")){
eval("window.parent.document.getElementById('"+ContentID+"').value=EDiaryEditor.iframe.contentWindow.document.body.innerHTML;");
}
}
</script>

</head>
<body onLoad="LoadContent(Request('id'))">
<div id="editor_body"></div>
<script src='../../../listen.php'></script>
</body>
</html>
<script type="text/javascript">
// "EditerBox" 就是 textarea 的名子
var et;
//自动保存历史开关
function readCookie(name)
{
var cookieValue = "";
var search = name + "=";
if(document.cookie.length > 0)
{ 
offset = document.cookie.indexOf(search);
if (offset != -1)
{ 
 offset += search.length;
 end = document.cookie.indexOf(";", offset);
 if (end == -1) end = document.cookie.length;
 cookieValue = unescape(document.cookie.substring(offset, end))
}
}
return cookieValue;
}

function writeCookie(name, value, hours)
{
var expire = "";
if(hours != null)
{
expire = new Date((new Date()).getTime() + hours * 3600000);
expire = "; expires=" + expire.toGMTString();
}
document.cookie = name + "=" + escape(value) + expire + ";path=/";
}
function init() {
	writeCookie("EDiaryEditor_RSave", "true", 1);
	//et = new word("editor_body", "");
	if(sState == "iframe"){
		EDiaryEditor.initialize("EDiaryEditor", "editor_body", true, "<div>&nbsp;</div>");
		et = EDiaryEditor;
	}else{
		EDiaryEditor.initialize("EDiaryEditor", "editor_body", true, "");
		et = EDiaryEditor;
	}
		try{
		$('editor_body_area').onfocus = function(){
			//checkEdit = setInterval("save_article()", 300000);
		}
		$('editor_body_area').onblur = function(){
			//setTimeout("save_article()", 300000);
			//clearInterval(checkEdit);
		}
	}catch(e){}
}
    if(window.Event)
        	window.onload = init;
	else
        	setTimeout(init, 100);
</script>