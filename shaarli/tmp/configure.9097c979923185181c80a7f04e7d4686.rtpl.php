<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<html>
<head><?php $tpl = new RainTpl;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("includes") . ( substr("includes",-1,1) != "/" ? "/" : "" ) . basename("includes") );?>

</head>
<body onload="document.configform.title.focus();">
<div id="pageheader">
	<?php $tpl = new RainTpl;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("page.header") . ( substr("page.header",-1,1) != "/" ? "/" : "" ) . basename("page.header") );?>

<?php echo $timezone_js;?>

	<div id=formcontainer>
    <form method="POST" action="" name="configform" id="configform">
	<input type="hidden" name="token" value="<?php echo $token;?>">
	<table border="0" cellpadding="20">

	    <tr><td><b>Page title:</b></td><td><input type="text" name="title" id="title" size="50" value="<?php echo $title;?>"></td></tr>

	    <tr><td valign="top"><b>Timezone:</b></td><td valign="top"><?php echo $timezone_form;?></td></tr>

	    <tr><td valign="top"><b>Redirector</b></td><td><input type="text" name="redirector" id="redirector" size="50" value="<?php echo $redirector;?>"><br>(e.g. <i>http://anonym.to/?</i> will mask the HTTP_REFERER)</td></tr>

        <tr><td valign="top"><b>Security:</b></td><td><input type="checkbox" name="disablesessionprotection" id="disablesessionprotection" <?php if( !empty($GLOBALS['disablesessionprotection']) ){ ?>checked<?php } ?>><label for="disablesessionprotection">&nbsp;Disable session cookie hijacking protection (Check this if you get disconnected often or if your IP address changes often.)</label></td></tr>

        <tr><td valign="top"><b>Features:</b></td><td>
        	<input type="checkbox" name="disablejquery" id="disablejquery" <?php if( !empty($GLOBALS['disablejquery']) ){ ?>checked<?php } ?>><label for="disablejquery">&nbsp;Disable jQuery and all heavy javascript (for example: Autocomplete in tags. Useful for slow computers.)</label>
        </td></tr>
        <tr><td valign="top"><b>New link:</b></td><td>
        	<input type="checkbox" name="privateLinkByDefault" id="privateLinkByDefault" <?php if( !empty($GLOBALS['privateLinkByDefault']) ){ ?>checked<?php } ?>/><label for="privateLinkByDefault">&nbsp;All new link are private by default</label></td>
        </tr>
	  <tr><td></td><td align="right"><input type="submit" name="Save" value="Save config" class="bigbutton"></td></tr>
	</table>
	</form>
	</div>
</div>
<?php $tpl = new RainTpl;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("page.footer") . ( substr("page.footer",-1,1) != "/" ? "/" : "" ) . basename("page.footer") );?>

</body>
</html>
