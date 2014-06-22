<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<html>
<head><?php $tpl = new RainTpl;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("includes") . ( substr("includes",-1,1) != "/" ? "/" : "" ) . basename("includes") );?>

<?php if( empty($GLOBALS['disablejquery']) ){ ?><script src="inc/jquery.min.js"></script><script src="inc/jquery-ui.min.js"></script><?php } ?>

</head>
<body
<?php if( $link["title"]=='' ){ ?>onload="document.linkform.lf_title.focus();"
<?php }elseif( $link["description"]=='' ){ ?>onload="document.linkform.lf_description.focus();"
<?php }else{ ?>onload="document.linkform.lf_tags.focus();"<?php } ?> >
<div id="pageheader">
	<!--<?php $tpl = new RainTpl;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("page.header") . ( substr("page.header",-1,1) != "/" ? "/" : "" ) . basename("page.header") );?>-->
	<div id=formcontainer>
	<div id="editlinkform">
	    <form method="post" name="linkform">
	        <input type="hidden" name="lf_linkdate" value="<?php echo $link["linkdate"];?>">
	        <i>URL</i><br><input type="text" name="lf_url" value="<?php echo htmlspecialchars( $link["url"] );?>" style="width:530px"><br>
	        <i>Titre</i><br><input type="text" name="lf_title" value="<?php echo htmlspecialchars( $link["title"] );?>" style="width:530px"><br>
	        <i>Description</i><br><textarea name="lf_description" rows="4" cols="25" style="width:530px"><?php echo htmlspecialchars( $link["description"] );?></textarea><br>
	        <i>Tags</i><br><input type="text" id="lf_tags" name="lf_tags" value="<?php echo htmlspecialchars( $link["tags"] );?>" style="width:530px"><br>
	        <?php if( ($link_is_new && $GLOBALS['privateLinkByDefault']==true) || $link["private"] == true ){ ?>

            <input type="checkbox" checked="checked" name="lf_private" id="lf_private">
            &nbsp;<label for="lf_private"><i>Lien privé</i></label><br>
            <?php }else{ ?>

            <input type="checkbox"  name="lf_private" id="lf_private">
            &nbsp;<label for="lf_private"><i>Lien privé</i></label><br>
            <?php } ?>

	        <input type="submit" value="Enregistrer" name="save_edit" class="bigbutton" style="margin-top:20px;">
	        <input type="submit" value="Annuler" name="cancel_edit" class="bigbutton" style="margin-left:10px;">
	        <?php if( !$link_is_new ){ ?><input type="submit" value="Supprimer" name="delete_link" class="bigbutton" style="margin-left:275px;" onClick="return confirmDeleteLink();"><?php } ?>

	        <input type="hidden" name="token" value="<?php echo $token;?>">
	        <?php if( $http_referer ){ ?><input type="hidden" name="returnurl" value="<?php echo htmlspecialchars( $http_referer );?>"><?php } ?>

	    </form>
	</div>
    </div>
</div>
<?php if( ($GLOBALS['config']['OPEN_SHAARLI'] || isLoggedIn()) && empty($GLOBALS['disablejquery']) ){ ?>

<script language="JavaScript">
$(document).ready(function()
{
    $('#lf_tags').autocomplete({source:'<?php echo $source;?>?ws=tags',minLength:1});
});
</script>
<?php } ?>

<?php $tpl = new RainTpl;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("page.footer") . ( substr("page.footer",-1,1) != "/" ? "/" : "" ) . basename("page.footer") );?> 
</body>
</html>