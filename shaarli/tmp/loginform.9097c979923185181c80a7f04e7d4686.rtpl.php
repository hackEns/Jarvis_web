<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<html>
<head><?php $tpl = new RainTpl;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("includes") . ( substr("includes",-1,1) != "/" ? "/" : "" ) . basename("includes") );?>

</head>
<body <?php if( ban_canLogin() ){ ?> onload="document.loginform.login.focus();"<?php } ?> >
<div id="pageheader">
	<?php $tpl = new RainTpl;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("page.header") . ( substr("page.header",-1,1) != "/" ? "/" : "" ) . basename("page.header") );?>

<div id="formcontainer">
	<div id="loginform">
<?php if( !ban_canLogin() ){ ?>

    You have been banned from login after too many failed attempts. Try later.
<?php }else{ ?>

    <form method="post" name="loginform">
    <input type="text" name="login" tabindex="1" placeholder="login"> <input type="password" name="password" tabindex="2" placeholder="mot de passe"> <input type="submit" value="Login" id="loginbutton" tabindex="4"><br>
    <div id="sessioncheck"><input style="margin:10 0 0 40;" type="checkbox" name="longlastingsession" id="longlastingsession"  tabindex="3"><label for="longlastingsession">&nbsp;Rester connecté</label></div>
    <input type="hidden" name="token" value="<?php echo $token;?>">
    <?php if( $returnurl ){ ?><input type="hidden" name="returnurl" value="<?php echo htmlspecialchars( $returnurl );?>"><?php } ?>

    </form>
<?php } ?>

    </div>
</div>
</div>
      <?php $tpl = new RainTpl;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("page.footer") . ( substr("page.footer",-1,1) != "/" ? "/" : "" ) . basename("page.footer") );?>

</body>
</html>
