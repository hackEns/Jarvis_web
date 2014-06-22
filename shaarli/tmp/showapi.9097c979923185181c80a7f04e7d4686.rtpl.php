<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<html>
<head><?php $tpl = new RainTpl;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("includes") . ( substr("includes",-1,1) != "/" ? "/" : "" ) . basename("includes") );?></head>
<body>
<div id="pageheader">
	<?php $tpl = new RainTpl;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("page.header") . ( substr("page.header",-1,1) != "/" ? "/" : "" ) . basename("page.header") );?>

</div>
<main>
	<form method="POST" action="" name="changeapiform" id="changeapiform">
		<input type="hidden" name="token" value="<?php echo $token;?>">
		<table border="0" cellpadding="20">
			<tr><td><b>API key:&nbsp;</b></td><td><?php echo $api_key;?></td></tr>
			<tr><td><b>API password:&nbsp;</b></td><td><?php echo $api_hash;?></td></tr>
			<tr><td></td><td align="right"><input type="submit" name="generate_api" value="Generate new API key" class="bigbutton"></td></tr>
		</table>
	</form>
</main>
<?php $tpl = new RainTpl;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("page.footer") . ( substr("page.footer",-1,1) != "/" ? "/" : "" ) . basename("page.footer") );?>

</body>
</html>
