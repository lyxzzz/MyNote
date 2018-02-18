<script type="text/javascript" src="/web_project/js/jquery.md5.js"></script>
<script type="text/javascript" src="/web_project/js/log.js"></script>
<link rel="stylesheet" href="/web_project/css/log.css">
<style>body{
        background-image: url(http://localhost/web_project/images/back1.jpg);
        /* 背景图垂直、水平均居中 */
        background-position: center center;
        /* 背景图不平铺 */
        background-repeat: no-repeat;
        /* 当内容高度大于图片高度时，背景图像的位置相对于viewport固定 */
        background-attachment: fixed;
        /* 让背景图基于容器大小伸缩 */
        background-size: cover;
        background-color:	#F0F0F0;
    }
</style>
<center><img src="/web_project/images/log.png" class="img-rounded" style="margin-top:180px;position:relative;background-color: transparent;  "></center>
<div class="center-block" style="padding: 50px 50px 5px;left:37%;background-color: white; margin-top:10px;width:500px;height:280px;position:absolute;border-radius: 30px;">
    <form class="bs-example bs-example-form" role="form" name="input" id="input" style="position:absolute;left:50px;top:0px;width:400px;height:325px;">
        <div class="input-group">
            <div style="position:absolute;left:0px;top:30px">
                <input type="text"  class="form-control" name="username" id="name" placeholder="您的用户名" autocomplete="off" disableautocomplete>
            </div>
        </div>
        <div  class="hidden" id="usertip" style="position:absolute;right:10px;top:37px;z-index: 10">
            <span style="color:red"></span>
        </div>
        <br>
        <div class="input-group">
            <div style="position:absolute;left:0px;top: 70px">
                <input type="password"  class="form-control" name="userpassword" id="passwd" placeholder="您的密码" autocomplete="off" disableautocomplete>
            </div>
        </div>
        <div  class="hidden" id="wordtip" style="position:absolute;right:10px;top:97px;z-index: 10">
            <span style="color:red"></span>
        </div>
        <br>
        <div class="input-group">
            <div style="position:absolute;left:0px;top:110px">
                <input type="text"  class="form-control" name="email" id="email" placeholder="您的邮箱" autocomplete="off" disableautocomplete>
            </div>
        </div>
        <div  class="hidden" id="emailtip" style="position:absolute;right:10px;top:157px;z-index: 10">
            <span style="color:red"></span>
        </div>
        <br>
        <div class="input-group">
            <div style="position:absolute;left:0px;margin-top: 150px">
                <input type="button"  class="btn btn-primary" value="注册" onclick="return signup();">
            </div>
        </div>

    </form>
</div>