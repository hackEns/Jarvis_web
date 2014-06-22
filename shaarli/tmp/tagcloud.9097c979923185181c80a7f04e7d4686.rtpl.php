<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<html>
<head><?php $tpl = new RainTpl;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("includes") . ( substr("includes",-1,1) != "/" ? "/" : "" ) . basename("includes") );?>

</head>
<body>
	<div id="pageheader"><?php $tpl = new RainTpl;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("page.header") . ( substr("page.header",-1,1) != "/" ? "/" : "" ) . basename("page.header") );?>

    <div id=formcontainer><div id="headerform" style="white-space:nowrap;">
        <form method="GET" class="searchform" name="searchform"><input type="text" id="searchform_value" name="searchterm" placeholder="recherche libre"> </form> <br/>
        <form method="GET" class="tagfilter" name="tagfilter"><input type="text" name="searchtags" id="tagfilter_value" placeholder="recherche par tag"></form></div>
	</div>
	</div>
<center>
<div id="cloudtag">
    <?php $counter1=-1; if( isset($tags) && is_array($tags) && sizeof($tags) ) foreach( $tags as $key1 => $value1 ){ $counter1++; ?>

    <span style="color:#99f; padding-left:5px; padding-right:2px;"><?php echo $value1["count"];?></span><a href="?searchtags=<?php echo htmlspecialchars( $key1 );?>" style="font-size:<?php echo $value1["size"];?>pt; font-weight:bold; color:black; text-decoration:none"><?php echo htmlspecialchars( $key1 );?></a>
    <?php } ?>

</div>
</center>
<?php $tpl = new RainTpl;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("page.footer") . ( substr("page.footer",-1,1) != "/" ? "/" : "" ) . basename("page.footer") );?>

</body>
</html>
