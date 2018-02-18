<link rel="stylesheet" href="/web_project/css/style.css" media="screen" type="text/css" />
<!--<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>-->
<!--<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">-->
<style>
</style>
<div style="position:relative;margin-top: 0;margin-left: ;width:80px;height:400px;z-index:998">
    <div class="sidebar" style="position:fixed;left:0;top:0">
        <div class="dropdown">
            <img data-toggle="dropdown" src="/web_project/images/timg.jpg" class="img-circle img-thumbnail" id="avatar" style="margin-left:25px;margin-top:150px;width:100px;height:100px">
            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" style="position:absolute;left:135px;top:160px;width:40px;z-index: 3">
                <li role="presentation">
                    <a role="menuitem" tabindex="-1" href="#">个人信息</a>
                </li>
                <li role="presentation">
                    <a role="menuitem" tabindex="-1" href="/web_project/index.php/user/logout">退出登录</a>
                </li>
            </ul>
        </div>

        <span class="badge" id="avatartip" style="position:absolute;left:125px;top:220px;z-index: 2"></span>
        <ul class="myul" style="padding:0;width:100%;margin-top:50px;margin-left:0">
            <li class="<?php echo "note"==$a?"beselected":""?>"><a class="myfont" href="/web_project/index.php/book/index" onclick="loadurl('/book/index')">笔记本</a></li>

            <li class="<?php echo "home"==$a?"beselected":""?>"><a class="myfont" href="/web_project/index.php/pages/mainpage">大厅</a></li>

            <li class="<?php echo "look"==$a?"beselected":""?>"><a class="myfont" href="#">关注</a></li>


        </ul>
    </div>
</div>
<!--<div id="block"style="position:absolute;left:150px;top:0;width:100px;height:200px;">-->
<!--<!--    -->--><?php ////require_once('/web_project/controllers/')?>
<!--</div>-->
