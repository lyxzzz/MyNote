<!--<link href="http://twitter.github.com/bootstrap/assets/js/google-code-prettify/prettify.css" rel="stylesheet">-->
<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="/web_project/css/234.css" type="text/css" />
<!--<link href="index.css" rel="stylesheet">-->
<!--键盘事件-->
<script src="/web_project/lib/hotkeys/jquery.hotkeys.js"></script>
<script src="/web_project/lib/bootstrap-wysiwyg.js"></script>
<script src="/web_project/js/inputbar.js"></script>
<script src="/web_project/js/234.js"></script>
<div  style="height: 50px;"></div>
<div style="float:left;position:absolute;width:1300px;height:200px;left:500px">
    <div id="notename">
    </div>
    <div id="label-div">
    </div>
</div>
<div id="view" style="position:absolute;left:480px;top:90px;width:1100px;">
    <hr style="margin-left:50px;margin-top:0;margin-bottom:0;width:1000px">
    <div id="looker"  style="margin-top:5px;margin-left:55px;padding:5px;margin-bottom:50px;border-radius:5px;position:relative;overflow-y: auto;width:1000px;height:700px;border:solid 1px whitesmoke;outline:none">
    </div>
</div>
<!--这里加上是为了让提示信息显示 不然会被遮挡-->
<div id="revise" class="hidden" style="position:absolute;left:480px;top:90px;width:1100px;">

    <form role="form">
        <div id="note-read" class="form-group">
            <select class="selector form-control">
                <option>自己可见</option>
                <option>所有人可见</option>
            </select>
        </div>
    </form>

    <input id="addlabel" type="text"  placeholder="新建标签..." autocomplete="off" disableautocomplete>

    <span id="labelrepeat" data-fail="重复标签" data-much="太多标签"></span>
    <div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor" style="margin-left: 50px;margin-top:40px;margin-bottom:5px">
        <div class="btn-group">
            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="icon-font"></i><b class="caret"></b></a>
            <ul class="dropdown-menu"> </ul>
        </div>
        <div class="btn-group">
            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="icon-text-height"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
                <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
                <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
            </ul>
        </div>
        <div class="btn-group">
            <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="icon-bold"></i></a> <!--加粗-->
            <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="icon-italic"></i></a><!-- 斜体-->
            <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="icon-strikethrough"></i></a><!-- 删除线-->
            <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="icon-underline"></i></a><!-- 下划线-->
        </div>
        <div class="btn-group">
            <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="icon-list-ul"></i></a><!-- 加点-->
            <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="icon-list-ol"></i></a><!-- 数字排序-->
            <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="icon-indent-left"></i></a><!-- 减少缩进-->
            <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="icon-indent-right"></i></a><!--增加缩进-->
        </div>
        <div class="btn-group">
            <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="icon-align-left"></i></a><!--左对齐-->
            <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="icon-align-center"></i></a><!--居中-->
            <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="icon-align-right"></i></a><!--右对齐-->
            <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="icon-align-justify"></i></a><!--垂直对齐-->
        </div>
        <div class="btn-group">
            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="icon-link"></i></a><!-- 链接-->
            <div class="dropdown-menu input-append">
                <input class="span2" placeholder="URL" type="text" data-edit="createLink"/>
                <button class="btn" type="button">Add</button>
            </div>
            <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="icon-cut"></i></a>
        </div>
        <div class="btn-group">
            <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="icon-picture"></i></a>
            <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
        </div>
        <div class="btn-group">
            <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="icon-undo"></i></a><!--撤销-->
            <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="icon-repeat"></i></a><!--恢复-->
            <a id="pdf" class="btn" data-edit="pdf" title="pdf"><span class="glyphicon glyphicon-print"></span></a><!--恢复-->
        </div>
        <div class="btn-group" style="float:right;margin-right:50px;    ">
            <a class="btn" id="save" title="保存"><span class="glyphicon glyphicon-floppy-save"></span></a><!-- 加点-->
        </div>
        <input type="text" data-edit="inserttext" id="voiceBtn" x-webkit-speech="">
    </div>
    <hr style="margin-left:50px;margin-top:0;margin-bottom:0;width:1000px">
    <div id="editor"  style="margin-top:5px;margin-left:55px;padding:5px;margin-bottom:50px;border-radius:5px;position:relative;overflow-y: auto;width:1000px;height:700px;border:solid 1px lightsteelblue;outline:none">
    </div>
</div>
