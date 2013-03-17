<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<!--
   This is a jQuery Tools standalone demo. Feel free to copy/paste.
   http://flowplayer.org/tools/demos/

   Do *not* reference CSS files and images from flowplayer.org when in
   production Enjoy!
-->
<head>
    <title>东南大学先声网</title>

    <!-- include the Tools -->
    <script src="__ROOT__/Public/Js/login/jquery.tools.min.js"></script>


    <!-- standalone page styling (can be removed) -->

    <link rel="stylesheet" type="text/css"
          href="__ROOT__/Public/Css/login/standalone.css"/>

    <link rel="stylesheet" href="__ROOT__/Public/Css/login/tabs.css"
          type="text/css" media="screen" />
    <link rel="stylesheet" href="__ROOT__/Public/Css/login/tabs-panes.css"
          type="text/css" media="screen" />

    <script type="text/javascript">

        function leagueLogin()
        {
            var name = $("#username_text2").val();
            var pass = $("#password_text2").val();
            if(name == "")
            {
                alert("请输入用户名");
            }
            else if(pass == "")
            {
                alert("请输入密码");
            }
            else
            {
                $.ajax({
                    url:"<?php echo U('/League/Login/');?>",
                    data:{username:name,password:pass},
                    type:"POST",
                    dataType:"json",
                    success:function(data){
                        if(data.status == 1){
                            if (data.data == 0) //第一次登陆
                            {

                            }
                            parent.location.reload();
                        }
                        else{
                            alert("登录失败");
                        }
                    }
                });
            }
        }

        function userLogin()
        {
            var card = $("#username_text1").val();
            var pass = $("#password_text1").val();
            if (card == "") 
                alert("请输入一卡通号");
            else if (pass == "")
                alert("请输入密码");
            else
            {
                
                $.ajax({
                    url:"<?php echo U('User/Login/login/');?>",
                    data:{cardNumber:card,passWord:pass},
                    type:"POST",
                    dataType:"json",
                    success:function(data,status)
                    {
                        if(data.status == 1)
                            parent.location.reload();
                        else
                        {
                            alert("登录失败");
                            
                        }
                    },
                });
            }
                    

        }
    </script>
    <script type="text/javascript">
    $(function(){
        $("#password_text1").keydown(function(e){
        if(e.keyCode == 13)
            userLogin();
        });
    });
    $(function(){
        $("#password_text2").keydown(function(e){
        if(e.keyCode == 13)
            leagueLogin();
        });
    });
    
    </script>
</head>
<body><!-- the tabs -->
<ul class="tabs">
    <li><a href="#">用户登录</a></li><!--存放每个页面的名称-->
    <li><a href="#">社团登录</a></li>
</ul>

<!-- tab "panes" -->
<div class="panes">
    <div>
        <div id="student">
            <div class="line" id="line1">
                <div id="username1" class="username">一卡通</div>
                <div id="input1" class="input"><input id="username_text1" class="username_text" type="username"  placeholder="个人用户名"/></div>
            </div>
            <div class="line" id="line2">
                <div id="password1" class="password">密码</div>
                <div id="input2" class="input"><input id="password_text1" class="password_text" type="password" placeholder="密码(一卡通密码)"/></div>
            </div>
            <div id="btn_login1" class="btn_login" type="submit" onclick="javascript:userLogin() ">登录</div>
        </div>
    </div><!--存放每个页面的内容-->
    <div>

        <div id="club">
            <div class="line" id="line3">
                <div id="username2" class="username">用户名</div>
                <div id="input3" class="input"><input id="username_text2" class="username_text" type="username" placeholder="社团用户名"/></div>
            </div>
            <div class="line" id="line4">
                <div id="password2" class="password">密码</div>
                <div id="input4" class="input"><input id="password_text2" class="password_text" type="password" placeholder="密码(社团密码)"/></div>
            </div>
            <div id="btn_login2" class="btn_login" type="submit" onclick="leagueLogin()">登录</div>
            <div id="btn_sine" class="btn_sine">还没有社团账号?请注册~</div>
        </div>

    </div><!--存放每个页面的内容-->
</div>

<script>
    // perform JavaScript after the document is scriptable.
    $("ul.tabs").tabs("div.panes > div");
    $(function() {
        // setup ul.tabs to work as tabs for each div directly under div.panes
        $("ul.tabs").tabs("#student");
        $("ul.tabs").tabs("#username1");
        $("ul.tabs").tabs("#password1");
        $("ul.tabs").tabs("#password_text1");
        $("ul.tabs").tabs("#username_text1");
        $("ul.tabs").tabs("#input1");
        $("ul.tabs").tabs("#input2");
        $("ul.tabs").tabs("#line1");
        $("ul.tabs").tabs("#line2");
        $("ul.tabs").tabs("#btn_login1");
        $("ul.tabs").tabs("div.panes > div");
    });
    $(function() {
        // setup ul.tabs to work as tabs for each div directly under div.panes

        $("ul.tabs").tabs("#club");
        $("ul.tabs").tabs("#username2");
        $("ul.tabs").tabs("#password2");
        $("ul.tabs").tabs("#password_text1");
        $("ul.tabs").tabs("#username_text1");
        $("ul.tabs").tabs("#input3");
        $("ul.tabs").tabs("#input4");
        $("ul.tabs").tabs("#line3");
        $("ul.tabs").tabs("#line4");
        $("ul.tabs").tabs("#btn_login2");
        $("ul.tabs").tabs("#btn_sine");
        $("ul.tabs").tabs("div.panes > div");
    });
</script>
</body>
</html>