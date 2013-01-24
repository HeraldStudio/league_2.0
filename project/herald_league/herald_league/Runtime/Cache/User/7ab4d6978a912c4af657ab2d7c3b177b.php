<?php if (!defined('THINK_PATH')) exit();?><style>
#squarebox{
border:1px solid #666666;
cursor:move;
float:left;
margin:8px 8px 4px 0;
overflow:hidden;
padding:0;
position:relative;
width:50px;
height:50px;
}
#squarepicture
{
position:relative;
}
#savebutton {
margin-bottom:4px;
background-color:#005EAC;
border-color:#D9DFEA #0E1F5B #0E1F5B #D9DFEA;
border-style:solid;
border-width:1px;
color:#FFFFFF;
font-family:"lucida grande",tahoma,verdana,arial,sans-serif;
font-size:12px;
padding:2px 15px 3px;
*padding:5px 5px 2px;
text-align:center;
cursor:pointer;
*position:relative;
*left:-2px;
*top:-8px;
display:block;
margin-top:5px;
}
</style>
<style media="screen" type="text/css">
#fileUploadContent {
outline:none;
margin:2px 0;
}
</style>
<script>
var squarex = 0, squarey = 0, user = XN.user.id;
XN.DOM.readyDo(function(){
var img=$('squarepicture');
var limit={w:0,h:0};
var start={x:0,y:0};
var styleStart={top:0,left:0};
var isStrictMode=document.compatMode!="BackCompat";
function getMousePosition(e){
if(e.pageX && e.pageY)
return {x:e.pageX,y:e.pageY};
else
return {x:e.clientX+(isStrictMode ? document.documentElement.scrollLeft : document.body.scrollLeft),y:e.clientY+(isStrictMode ? document.documentElement.scrollTop : document.body.scrollTop)};
}
function mouseMove(e){
e=e || event;
var pos=getMousePosition(e);
var top=styleStart.top+(pos.y-start.y);
var left=styleStart.left+(pos.x-start.x);
if(top>0)
top=0;
else if(top<limit.h)
top=limit.h;
if(left>0)
left=0;
else if(left<limit.w)
left=limit.w;
img.style.top=top+"px";
img.style.left=left+"px";
/*var squarex = thumbnailUploadFrame.document.getElementById("squarex");
var squarey = thumbnailUploadFrame.document.getElementById("squarey");*/
squarex = -left;
squarey = -top;
}
function setLimit(){
img.offsetWidth>img.offsetHeight ? (img.height=58) : (img.width=58);
limit={w:50-img.offsetWidth,h:50-img.offsetHeight};
}
if(img.complete ||(img.readyState && img.readyState=="complete"))
setLimit();
else
img.onload=setLimit;
img.onmousedown=function(e){
e=e || event;
start=getMousePosition(e);
styleStart={left:parseInt(img.style.left),top:parseInt(img.style.top)};
document.onmousemove=mouseMove;
if(img.setCapture)
img.setCapture();
return false;
};
img.onmouseup=img.onmouseout=function(e){
document.onmousemove=null;
if(img.releaseCapture)
img.releaseCapture();
};
});
</script>
<script>
var fileUploadDiv = 'fileUploadDiv';
var fileUploadContent = 'fileUploadContent';
var cameraUploadDiv = 'cameraUploadDiv';
var cameraUploadContent = 'cameraUploadContent';
var errorDiv = 'uploadError';
var useCamera = false;
function uploadThumbnailSuccess(){
$('uploadHeadSuccess').hide();//关闭上传头像成功
$('uploadThumbnailSuccess').show();//显示小头像保存成功
}
// no camera, but click use camera, arrive here
function toUseUpload() {
uploadHeadShowError('没有找到可用的摄像头！');
$('uploadHeadSuccess').hide();
$('uploadThumbnailSuccess').hide();
uploadHeadSwfUseFile();
}
function uploadHeadShowError(msg) {
$('uploadHeadSuccess').hide();
$('uploadThumbnailSuccess').hide();
var e = $(errorDiv);
e.innerHTML = msg;
e.show();
setTimeout('$(errorDiv).hide();', 1000 * 8);
}
function boldTitle(id) {
if (id == 2) {
$("useFileTitle").style.fontWeight = 'normal';
$("useCameraTitle").style.fontWeight = 'bold';
} else {
$("useFileTitle").style.fontWeight = 'bold';
$("useCameraTitle").style.fontWeight = 'normal';
}
}
function uploadHeadSwfUseFile() {
$('uploadHeadSuccess').hide();
$('uploadThumbnailSuccess').hide();
if (useCamera){
$(cameraUploadDiv).hide();
}
useCamera = false;
boldTitle(1);
$(fileUploadContent).show();
$(fileUploadDiv).show();
}
function uploadHeadSwfUseCamera() {
$('uploadHeadSuccess').hide();
$('uploadThumbnailSuccess').hide();
useCamera = true;
boldTitle(2);
$(fileUploadContent).hide();
$(fileUploadDiv).hide();
var flashvars = {};
flashvars.tsc = "de87c63c8e292ffc273a1f945411e20d";
flashvars.societyguester = "425173939-a6ba4708304f182874430df1aff8fbfe";
flashvars.hostid = "425173939";
flashvars.profileUrl = "http://head.upload.renren.com/Upload.do?success=1";
flashvars.uploadUrl = "http://head2.upload.renren.com/head2/CameraUpload.f";
var params = {};
params.menu = "false";
params.quality = "autohigh";
params.wmode = "opaque";
params.allowfullscreen = "true";
params.allowscriptaccess = "always";
params.allownetworking = "all";
var attributes = {};
attributes.id = "cameraUploadContent";
swfobject.embedSWF("http://head2.upload.renren.com/pages/profile/newCameraEditer.swf", "cameraUploadContent", "440", "380", "9.0.0", false, flashvars, params, attributes);
$(cameraUploadDiv).show();
}
// IE and FF only
function uploadHeadSwfChkFlash() {
var flash_installed = false;
if (navigator.mimeTypes.length) {
if(navigator.mimeTypes["application/x-shockwave-flash"]) flash_installed = true;
} else if (window.ActiveXObject) {
for (x = 1; x <= 20; x++) {
try {
flash_test = eval("new ActiveXObject('ShockwaveFlash.ShockwaveFlash." + x + "');");
if (flash_test) flash_installed = true;
} catch(e) { }
}
}
return flash_installed;
}
function submit(){
new XN.net.xmlhttp({
url: 'http://head2.upload.renren.com/upload.fcgi',
method: 'POST',
data: XN.array.toQueryString({pagetype:'addthumbnail',uploadid:user,hostid:user,x: squarex, y:squarey, user:user}),
onSuccess: function(r) {
try {
var j = XN.json.parse(r.responseText);
if (j.code > 0) {
XN.DO.showError(j.msg);
return false;
}
uploadThumbnailSuccess();
} catch(e) {
XN.log(e);
}
},
onError: function() {}
});
}
</script>
<h2>修改我的头像</h2>
<h3>当前头像</h3>
<img src = "__Uploads__/UserAvatar/m_<?php echo ($avataraddress); ?>"/>
<h3>小头像</h3>
<div id = "squarebox">
<img id = "squarepicture" src = "__Uploads__/UserAvatar/s_<?php echo ($avataraddress); ?>">

</div>
<input type = "submit" id = "savebutton" value = "保存小头像" />
<form method='post' action="__URL__/changeAvatar/" enctype="multipart/form-data">
	<input name="image" type="file"/><br/>
	<input name = "subdata" type = "hidden" value = "<?php echo ($userid); ?>">
	<input type="submit" value="提交">
</form>