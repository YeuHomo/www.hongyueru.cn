<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<table>

    <?php if(is_array($order)): foreach($order as $key=>$vo): ?><tr>
        <td rowspan="5" style="background-color:#fff">
            <?php echo ($vo["create_at"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;
            <?php echo ($vo["order_id"]); ?>
        </td>

    </tr><?php endforeach; endif; ?>
</table>

</body>
</html>