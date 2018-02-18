<link rel="stylesheet" href="/web_project/css/home.css" type="text/css" />
<style>#guide{
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
<script src="/web_project/js/home1.js"></script>

<div id="guide" style="position:fixed;left:150px;top:0;z-index: 30;width:100%;height:100%">
    <ul class="nav nav-tabs">
        <li class="<?php echo "writer"==$active?"active":""?>"style="margin-left: 35%" data-link="writer"><a href="#">作者</a></li>
        <li class="<?php echo "book"==$active?"active":""?>" data-link="book"><a href="#">笔记本</a></li>
        <li class="<?php echo "note"==$active?"active":""?>" data-link="note"><a href="#">笔记</a></li>
    </ul>
</div>

