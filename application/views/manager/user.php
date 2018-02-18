<input id="search-event" type="text"  style="border-radius: 30px;width:300px;margin-left:800px;"class="form-control" name="username" placeholder="搜索" autocomplete="off" disableautocomplete>
<?php foreach ($user as $u): ?>

    <div class="book-div" data-myid="<?php echo $u['uid']?>" style="margin-top:20px" data-toggle="modal" data-target="#isdelete">
        <span class="name"><?php echo $u['ucount']?>
    </div>
    <HR style="margin:0;width:1600px;color=darkseagreen;FILTER: alpha(opacity=100,finishopacity=0,style=3)" width="80%" SIZE=3>

<?php endforeach; ?>
<script type="text/javascript" src="/web_project/js/manager.js"></script>
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
