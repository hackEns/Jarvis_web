<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<html>
<head><?php $tpl = new RainTpl;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("includes") . ( substr("includes",-1,1) != "/" ? "/" : "" ) . basename("includes") );?>

<?php if( empty($GLOBALS['disablejquery']) ){ ?>	
<script src="inc/jquery/js/jquery.min.js"></script>
<script src="inc/jquery/js/jquery-ui.min.js"></script>
<script src="inc/jquery/js/jquery.lazyload.min.js"></script>
<?php } ?>

</head>
<body>
	<div id="pageheader"><?php $tpl = new RainTpl;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("page.header") . ( substr("page.header",-1,1) != "/" ? "/" : "" ) . basename("page.header") );?>

    <div id=formcontainer><div id="headerform" style="white-space:nowrap;">
        <form method="GET" class="searchform" name="searchform"><input type="text" id="searchform_value" name="searchterm" placeholder="recherche libre"> </form> <br/>
        <form method="GET" class="tagfilter" name="tagfilter"><input type="text" name="searchtags" id="tagfilter_value" placeholder="recherche par tag"></form></div>
	</div>
</div>
<center>
<div class="picwall_container">
    <?php $counter1=-1; if( isset($linksToDisplay) && is_array($linksToDisplay) && sizeof($linksToDisplay) ) foreach( $linksToDisplay as $key1 => $value1 ){ $counter1++; ?>

    <div class="picwall_pictureframe">
	    <?php echo $value1["thumbnail"];?><a href="<?php echo $value1["permalink"];?>"><span class="info"><?php echo htmlspecialchars( $value1["title"] );?></span></a>
    </div>
    <?php } ?>

</div>
</center>
<?php $tpl = new RainTpl;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("page.footer") . ( substr("page.footer",-1,1) != "/" ? "/" : "" ) . basename("page.footer") );?>


<?php if( empty($GLOBALS['disablejquery']) ){ ?> 
<script>
$(document).ready(function() {
    $("img.lazyimage").show().lazyload();
});
</script>
<?php } ?> 
</body>
</html>
