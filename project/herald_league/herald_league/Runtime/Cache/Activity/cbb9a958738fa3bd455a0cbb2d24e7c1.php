<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">

<?php if(is_array($recent)): foreach($recent as $key=>$r): echo ($r["isstart"]); ?>
    <?php if($r["isstart"] < 0): ?>进行中
        <?php else: ?>
        未开始<?php endif; ?>
    <br><?php endforeach; endif; ?>
<?php if(is_array($heatclass)): foreach($heatclass as $key=>$c): echo ($c["class_name"]); endforeach; endif; ?><br>
<a href="<?php echo ($attention); ?>/activityid/1/action/add">关注活动1</a><br>
<a href="<?php echo ($attention); ?>/activityid/1/action/del">取消关注活动1</a><br>
</html>