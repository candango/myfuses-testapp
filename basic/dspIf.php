<h3>If Example</h3>
<b>User Status:</b> <?=$status? "Informed" : "Not Informed" ?><br>
<?php if ($status) {?>
<a href="<?=xfa("goToMyself")?>">Switch Status</a>
<?php } else {?>
<a href="<?=xfa("goToMyself", true)?>pessoa=1">Switch Status</a>
<?php }?>
<br>