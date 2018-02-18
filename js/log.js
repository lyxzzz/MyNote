function signin() {
    checklogin();
    return false;
}
function signup() {
    checksignup();
    return false;
}
$(document).ready(function(){
    $("#name").click(function(){
        if(!$("#usertip").hasClass("hidden"))
        {
            $("#usertip").addClass("hidden");
        }
    });
    $("#passwd").click(function(){
        if(!$("#wordtip").hasClass("hidden"))
        {
            $("#wordtip").addClass("hidden");
        }
    });
    $("#email").click(function(){
        if(!$("#emailtip").hasClass("hidden"))
        {
            $("#emailtip").addClass("hidden");
        }
    });
    document.onkeydown = function (event) {
        var e = event || window.event;
        if (e && e.keyCode == 13) { //回车键的键值为13
            $(".btn").click(); //调用登录按钮的登录事件
        }
    };
});

function subfunc($word){
    $estxt=$.md5($word);
    // alert($estxt);
    return $estxt;
}
function checklogin() {
    $name=document.getElementById("name").value;
    $word=document.getElementById("passwd").value;
    $("#name").val("");
    $("#passwd").val("");
    $canGo=true;
    $name_reg=/^[a-zA-Z][a-zA-Z0-9_]{5,15}$/;
    $pass_reg=/^[a-zA-Z0-9_]{6,16}$/;
    $pass_trim=/^.*? .*?$/;
    if (!$name_reg.test($name)) {
        $("#name").focus();
        $("#name").addClass("error");
        $("#usertip").removeClass("hidden");
        $("#usertip span").html("用户名不合法");
        $canGO=false;
    }
    else
    {
        if(!$("#usertip").hasClass("hidden"))
        {
            $("#usertip").addClass("hidden");
        }
        if($("#name").hasClass("error"))
        {
            $("#name").removeClass("error");
        }
    }
    if (!$pass_reg.test($word)||$word==$name) {
        $("#passwd").focus();
        $("#passwd").addClass("error");
        $("#wordtip").removeClass("hidden");
        if($word.indexOf(" ")>=0)
        {
            $("#wordtip span").html("密码中包含空格");
        }
        else
        {
            $("#wordtip span").html("密码不合法");
        }
        $canGO=false;
    }
    else
    {
        if(!$("#wordtip").hasClass("hidden"))
        {
            $("#wordtip").addClass("hidden");
        }
        if($("#passwd").hasClass("error"))
        {
            $("#passwd").removeClass("error");
        }
    }
    if(!$canGo)
    {
        return false;
    }
    $word=subfunc($word);
    gin($name,$word);
}
function gin($name,$word) {
    $.ajax({
        type: "POST",
        url:  "/web_project/index.php/user/signin",
        data: "username="+$name.toString()+"&userpassword="+$word.toString(),
        datatype: "text",
        async: true,
        error: function(request) {
            alert("Connection error");
        },
        success: function(data) {
            if(data=="fail")
            {
                $("#name").focus();
                $("#name").addClass("error");
                $("#usertip").removeClass("hidden");
                $("#usertip span").html("请检查用户名");
                $("#passwd").focus();
                $("#passwd").addClass("error");
                $("#wordtip").removeClass("hidden");
                $("#wordtip span").html("请检查密码");
            }
            else
            {
                $(location).attr('href', 'http://localhost/web_project/index.php/book/index');
            }
        }
    });
}
function checksignup() {
    $name=document.getElementById("name").value;
    $word=document.getElementById("passwd").value;
    $email=document.getElementById("email").value;
    $("#name").val("");
    $("#passwd").val("");
    $("#email").val("");
    $canGo=true;
    $name_reg=/^[a-zA-Z][a-zA-Z0-9_]{5,15}$/;
    $pass_reg=/^[a-zA-Z0-9_]{6,16}$/;
    $email_reg=/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/;
    $pass_trim=/^.*? .*?$/;
    if (!$name_reg.test($name)) {
        $("#name").focus();
        $("#name").addClass("error");
        $("#usertip").removeClass("hidden");
        $("#usertip span").html("用户名不合法");
        $canGO=false;
    }
    else
    {
        if(!$("#usertip").hasClass("hidden"))
        {
            $("#usertip").addClass("hidden");
        }
        if($("#name").hasClass("error"))
        {
            $("#name").removeClass("error");
        }
    }
    if (!$pass_reg.test($word)||$word==$name) {
        $("#passwd").focus();
        $("#passwd").addClass("error");
        $("#wordtip").removeClass("hidden");
        if($word.indexOf(" ")>=0)
        {
            $("#wordtip span").html("密码中包含空格");
        }
        else
        {
            $("#wordtip span").html("密码不合法");
        }
        $canGO=false;
    }
    else
    {
        if(!$("#wordtip").hasClass("hidden"))
        {
            $("#wordtip").addClass("hidden");
        }
        if($("#passwd").hasClass("error"))
        {
            $("#passwd").removeClass("error");
        }
    }
    if (!$email_reg.test($email)) {
        $("#email").focus();
        $("#email").addClass("error");
        $("#emailtip").removeClass("hidden");
        $("#emailtip span").html("邮箱不合法");
        $canGO=false;
    }
    else
    {
        if(!$("#emailtip").hasClass("hidden"))
        {
            $("#emailtip").addClass("hidden");
        }
        if($("#email").hasClass("error"))
        {
            $("#email").removeClass("error");
        }
    }
    if(!$canGo)
    {
        return false;
    }
    $word=subfunc($word);
    $.ajax({
        type: "POST",
        url:  "/web_project/index.php/user/signup",
        data: "username="+$name.toString()+"&userpassword="+$word.toString()+"&email="+$email.toString(),
        datatype: "text",
        async: false,
        error: function(request) {
            alert("Connection error");
        },
        success: function(data) {
            //alert(data);
            if(data=="success")
            {
                gin($name,$word);
            }
            else
            {
                $("#name").focus();
                $("#name").addClass("error");
                $("#usertip").removeClass("hidden");
                $("#usertip span").html("用户名重复");
            }
        }
    });
}