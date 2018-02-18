
<link rel="stylesheet" href="/web_project/css/books.css">
<iframe src="/web_project/index.php/note/index" id="iframe1" width="1600px" height="940px" frameborder="0" style="position:absolute;left:300px;top:0" scrolling="false">
</iframe>
<div id="notebooks-div" style="position:absolute;left:150px;top:0;z-index: 30">
    <div style="z-index: 999;position:fixed;width:400px;height:100px">
        <label style="width:275px;height:150px;position:fixed;top:0px;left:160px;background-image: url(http://localhost/web_project/images/top.png);
    /* 背景图垂直、水平均居中 */
    background-position: center center;
    /* 背景图不平铺 */
    background-repeat: no-repeat;
    /* 当内容高度大于图片高度时，背景图像的位置相对于viewport固定 */
    background-attachment: fixed;
    /* 让背景图基于容器大小伸缩 */
    background-size: cover;"></label>
        <span id="my-head" style="z-index: 20">我的笔记本</span>
        <button id="createbooks" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            +</button>
`
        <form class="bs-example bs-example-form" role="form" name="input" id="input" style="position:fixed;left:200px;top:0px;z-index: 20">
            <div class="input-group">
                <div style="position:relative;margin-top:100px;">
                    <input id="search-event" type="text"  style="border-radius: 30px"class="form-control" name="username" placeholder="搜索" autocomplete="off" disableautocomplete>
                </div>
            </div>
        </form>
    </div>
    <div id="books-block" style="z-index: -1">
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="position: absolute;top:20%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="cancel close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    创建笔记本
                </h4>
            </div>
            <div class="modal-body">
                <form class="bs-example bs-example-form" role="form" name="input" id="input">
                    <div class="input-group">
                        <center>
                            <input id="bookname" type="text"  style="border-radius: 30px;width:300px;margin-left:45%"class="form-control" name="username" id="name" placeholder="笔记本名" autocomplete="off" disableautocomplete>
                        </center>
                        <span class="repeat-name hidden">重复名</span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="cancel btn btn-default"
                        data-dismiss="modal" >关闭
                </button>
                <button id="submit-books" type="button" class="btn btn-primary">
                    提交
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div id="notes-block">
    <div style="z-index: 999;position:fixed;width:400px;height:100px">
        <label style="width:293px;height:150px;position:fixed;top:0px;left:440px;background-color: whitesmoke;"></label>
        <span  id="notes-head" style="z-index: 20">我的笔记</span>
        <button id="createnotes" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">
            +</button>
        <form class="bs-example bs-example-form" role="form" name="input" id="noteinput" style="position:fixed;left:520px;top:0px;z-index: 20">
            <div class="input-group">
                <div style="position:relative;margin-top:100px;">
                    <input id="search-notes" type="text"  style="border-radius: 30px"class="form-control" name="username" placeholder="搜索" autocomplete="off" disableautocomplete>
                </div>
            </div>
        </form>
    </div>
    <div id="notes-div">
    </div>
</div>
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="position: absolute;top:20%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="cancel close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
                <h4 class="modal-title" id="myModalLabel2">
                    创建笔记
                </h4>
            </div>
            <div class="modal-body">
                <form class="bs-example bs-example-form" role="form" name="input" id="input">
                    <div class="input-group">
                        <center>
                            <input id="bookname2" type="text"  style="border-radius: 30px;width:300px;margin-left:45%"class="form-control" name="username" placeholder="笔记名" autocomplete="off" disableautocomplete>
                        </center>
                        <span class="repeat-name hidden">重复名</span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="cancel btn btn-default"
                        data-dismiss="modal" >关闭
                </button>
                <button id="submit-books2" type="button" class="btn btn-primary" >
                    提交
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="isdelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="position: absolute;top:20%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form class="bs-example bs-example-form" role="form" name="input" id="input">
                    <div class="input-group">
                        <center>
                            <span>是否要删除？</span>
                        </center>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">取消
                </button>
                <button id="submit-delete" type="button" class="btn btn-primary">
                    确定
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="bookoption" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="position: absolute;top:20%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form role="form">
                    <div class="form-group">
                        <div id="hidden-id" class="hidden"></div>
                        <label for="name">设置可见权限</label>
                        <select class="selector form-control">
                            <option>自己可见</option>
                            <option>所有人可见</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">取消
                </button>
                <button id="submit-option" type="button" class="btn btn-primary">
                    确定
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript" src="/web_project/js/mainpage.js"></script>
<script type="text/javascript" src="/web_project/js/books.js"></script>