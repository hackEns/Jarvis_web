<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<html>
<head><?php $tpl = new RainTpl;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("includes") . ( substr("includes",-1,1) != "/" ? "/" : "" ) . basename("includes") );?>

</head>
<body>
<div id="pageheader">
    <?php $tpl = new RainTpl;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("page.header") . ( substr("page.header",-1,1) != "/" ? "/" : "" ) . basename("page.header") );?>

    <div id=formcontainer><div id="headerform" style="white-space:nowrap;">
        <form method="GET" class="searchform" name="searchform"><input type="text" id="searchform_value" name="searchterm" placeholder="recherche libre"> </form> <br/>
        <form method="GET" class="tagfilter" name="tagfilter"><input type="text" name="searchtags" id="tagfilter_value" placeholder="recherche par tag"></form></div>
	</div>
</div>
<div id="linklist">

    <?php $tpl = new RainTpl;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("linklist.paging") . ( substr("linklist.paging",-1,1) != "/" ? "/" : "" ) . basename("linklist.paging") );?>


    <?php if( count($links)==0 ){ ?>

        <div id="searchcriteria">Pas de résultats.</i></div>
    <?php }else{ ?>

        <?php if( $search_type=='fulltext' ){ ?>

            <div id="searchcriteria"><?php echo $result_count;?> résultats pour <i><?php echo $search_crits;?></i></div>
        <?php } ?>

        <?php if( $search_type=='tags' ){ ?>

            <div id="searchcriteria"><?php echo $result_count;?> résultats pour le tag <i>
            <?php $counter1=-1; if( isset($search_crits) && is_array($search_crits) && sizeof($search_crits) ) foreach( $search_crits as $key1 => $value1 ){ $counter1++; ?>

                <span title="Remove tag"><a href="?removetag=<?php echo htmlspecialchars( $value1 );?>"><?php echo htmlspecialchars( $value1 );?></i> <span style="border-left:1px solid #aaa; padding-left:5px; color:#6767A7;">x</span></a></span>
            <?php } ?></div>
        <?php } ?>

    <?php } ?>

    <ul>
        <?php $counter1=-1; if( isset($links) && is_array($links) && sizeof($links) ) foreach( $links as $key1 => $value1 ){ $counter1++; ?>

        <li<?php if( $value1["class"] ){ ?> class="<?php echo $value1["class"];?>"<?php } ?>>
            <a name="<?php echo smallHash( $value1["linkdate"] );?>" id="<?php echo smallHash( $value1["linkdate"] );?>"></a>
            <div class="thumbnail"><?php echo thumbnail( $value1["url"] );?></div>
            <div class="linkcontainer">
                <?php if( isLoggedIn() ){ ?>

                    <div class="linkeditbuttons">
                        <form method="GET" class="buttoneditform"><input type="hidden" name="edit_link" value="<?php echo $value1["linkdate"];?>"><input type="image" alt="Edit" src="images/edit_icon.png" title="Edit" class="button_edit"></form><br>
                        <form method="POST" class="buttoneditform"><input type="hidden" name="lf_linkdate" value="<?php echo $value1["linkdate"];?>">
                        <input type="hidden" name="token" value="<?php echo $token;?>"><input type="hidden" name="delete_link"><input type="image" alt="Delete" src="images/delete_icon.png" title="Delete" class="button_delete" onClick="return confirmDeleteLink();"></form>
                    </div>
                <?php } ?>

                <span class="linktitle"><a href="<?php echo $redirector;?><?php echo htmlspecialchars( $value1["url"] );?>"><?php echo htmlspecialchars( $value1["title"] );?></a></span><br/>
                <span class="linktag"><?php if( $value1["tags"] ){ ?><?php $counter2=-1; if( isset($value1["taglist"]) && is_array($value1["taglist"]) && sizeof($value1["taglist"]) ) foreach( $value1["taglist"] as $key2 => $value2 ){ $counter2++; ?> <a href="?addtag=<?php echo urlencode( $value2 );?>"><i class="glyphicon glyphicon-tag"></i> <?php echo htmlspecialchars( $value2 );?></a> <?php } ?><?php } ?></span>
				<br>
                <?php if( $value1["description"] ){ ?><div class="linkdescription"<?php if( $search_type=='permalink' ){ ?> style="max-height:none !important;"<?php } ?>><?php echo $value1["description"];?></div><?php } ?>

				<br>
                <?php if( !$GLOBALS['config']['HIDE_TIMESTAMPS'] || isLoggedIn() ){ ?>

                    <i class="glyphicon glyphicon-calendar"></i> <span class="linkdate" title="Permalien"><?php echo htmlspecialchars( $value1["localdate"] );?> - <a href="?<?php echo smallHash( $value1["linkdate"] );?>">permalien</a> - </span>
                <?php }else{ ?>

                    <span class="linkdate" title="Short link here"><i class="glyphicon glyphicon-calendar"></i> <a href="?<?php echo smallHash( $value1["linkdate"] );?>">permalink</a></span>
                <?php } ?>

                <div style="position:relative;display:inline;"><a href="http://qrfree.kaywa.com/?l=1&s=8&d=<?php echo urlencode( $scripturl );?>%3F<?php echo smallHash( $value1["linkdate"] );?>"
                    onclick="showQrCode(this); return false;" class="qrcode" data-permalink="<?php echo $scripturl;?>?<?php echo smallHash( $value1["linkdate"] );?>"><i class="glyphicon glyphicon-qrcode"></i></a></div>
    - <span class="linkurl" title="Short link"><?php echo htmlspecialchars( $value1["url"] );?></span><br/>
<div id="partagesocial"><i class="glyphicon glyphicon-send"></i>    
<a target="_blank" title="Twitter" href="https://twitter.com/share?url=<?php echo htmlspecialchars( $value1["url"] );?>&text=<?php echo htmlspecialchars(str_replace('|','-',$value1["title"]));( $value1["title"] );?>&via=alxju" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=700');return false;">twitter</a> &middot; 
<a target="_blank" title="Facebook" href="https://www.facebook.com/sharer.php?u=<?php echo htmlspecialchars( $value1["url"] );?>&t=<?php echo htmlspecialchars( $value1["title"] );?>" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=700');return false;">facebook</a> &middot; 
<a target="_blank" title="Google +" href="https://plus.google.com/share?url=<?php echo htmlspecialchars( $value1["url"] );?>&hl=fr" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=450,width=650');return false;">google+</a> &middot; 
<a target="_blank" title="LinkedIn" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo htmlspecialchars( $value1["url"] );?>&title=<?php echo htmlspecialchars( $value1["title"] );?>" rel="nofollow" onclick="javascript:window.open(this.href, '','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=450,width=650');return false;">linkedin</a> &middot; 
<a target="_blank" title="Pinterest" href="http://pinterest.com/pin/create/button/?url=<?php echo htmlspecialchars( $value1["url"] );?>&media=<?php echo htmlspecialchars( $value1["url"] );?>&description=<?php echo htmlspecialchars( $value1["title"] );?>" rel="nofollow" onclick="javascript:window.open(this.href, '','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=450,width=650');return false;">pinterest</a> &middot; 
<a target="_blank" title="Scoop.it" href="http://www.scoop.it/oexchange/share?url=<?php echo htmlspecialchars( $value1["url"] );?>&title=<?php echo htmlspecialchars( $value1["title"] );?>" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=800px,width=1150px');return false;">scoop.it</a> &middot; 
<a target="_blank" title="Envoyer par mail" href="mailto:?subject=<?php echo htmlspecialchars( $value1["title"] );?>&body=<?php echo htmlspecialchars( $value1["url"] );?>" rel="nofollow">courriel</a> &middot; 
<?php if( isLoggedIn() ){ ?>

<a target="_blank" title="WP" href="https://effingo.be/blog/wp-admin/press-this.php?u=<?php echo htmlspecialchars( $value1["url"] );?>&t=<?php echo htmlspecialchars( $value1["title"] );?>&s=&v=4" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=800,width=1150');return false;">wordpress</a>
<?php } ?>

</div><br>  
     </li>
    <?php } ?>

    </ul>

    <?php $tpl = new RainTpl;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("linklist.paging") . ( substr("linklist.paging",-1,1) != "/" ? "/" : "" ) . basename("linklist.paging") );?>


</div>

    <?php $tpl = new RainTpl;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("page.footer") . ( substr("page.footer",-1,1) != "/" ? "/" : "" ) . basename("page.footer") );?> 

<script language="JavaScript">
// Remove any displayed QR-Code
function remove_qrcode()
{ 
    var elem = document.getElementById("permalinkQrcode");
    if (elem) elem.parentNode.removeChild(elem);
    return false;
}

// Show the QR-Code of a permalink (when the QR-Code icon is clicked).
function showQrCode(caller,loading=false)
{ 
    // Dynamic javascript lib loading: We only load qr.js if the QR code icon is clicked:
    if (typeof(qr)=='undefined') // Load qr.js only if not present.
    {
        if (!loading)  // If javascript lib is still loading, do not append script to body.
        {
            var element = document.createElement("script");
            element.src = "inc/qr.min.js";
            document.body.appendChild(element);
        }
        setTimeout(function() { showQrCode(caller,true);}, 200); // Retry in 200 milliseconds.
        return false;
    }

    // Remove previous qrcode if present.
    remove_qrcode();
    
    // Build the div which contains the QR-Code:
    var element = document.createElement('div');
    element.id="permalinkQrcode";
	// Make QR-Code div commit sepuku when clicked:
    if ( element.attachEvent ){ element.attachEvent('onclick', 'this.parentNode.removeChild(this);' ); } // Damn IE
    else { element.setAttribute('onclick', 'this.parentNode.removeChild(this);' ); }
    
    // Build the QR-Code:
    var image = qr.image({size: 8,value: caller.dataset.permalink});
    if (image)
    { 
        element.appendChild(image);
        element.innerHTML+= "<br>Cliquez pour fermer";
        caller.parentNode.appendChild(element);
    }
    else
    {
        element.innerHTML="Your browser does not seem to be HTML5 compatible.";
    }
    return false;
}
</script>
</body>
</html>
