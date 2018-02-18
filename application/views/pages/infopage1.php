
    <span id="title"><?php echo $title?></span>

<div id="loader" style="position:absolute;left:550px;top:150px;z-index: 30;width:800px;height:600px; scroll:auto">
    <?php foreach ($data as $note): ?>

    <div class="block" id="block-<?php echo $note['id']?>" data-myid="<?php echo $note['id']?>" data-myname="<?php echo $note['name']?>" style="text-align:center"">
    <a class="mylink" href="/web_project/index.php/note/loadinfo/<?php echo $note['id']?>" data-link="<?php echo $note['id']?>" style="margin-top:100px;font-size:20px !important">
        <?php echo $note['name'] ;echo "<br>"?>
    </a>
    <hr style="margin-top:0px;height:10px;border:none;border-top:10px groove skyblue;" />
</div>


<?php endforeach; ?>
</div>
