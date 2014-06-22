<?php if(!class_exists('raintpl')){exit;}?>

   <div id="menu">
   <div id="logo"><a href = "http://hackens.org"></a></div>
    <span id="bonjourshaarli" class="nomobile">a déjà partagé <?php if( !empty($linkcount) ){ ?><?php echo $linkcount;?><?php } ?> liens !</span>
    <span id="shaarli_title"><a href="?"><?php echo htmlspecialchars( $shaarlititle );?></a></span>
<?php if( !empty($_GET['source']) && $_GET['source']=='bookmarklet' ){ ?>

    <style TYPE="text/css">#pageheader {margin-top:-10px} #menu {height: 100px;} #bonjourshaarli{display:none;}</style>
	
<?php }else{ ?>

    <a href="http://hackens.org"><i class="glyphicon glyphicon-home"></i> hackEns</a>
    <a id="activeLinklist" href="?" class="nomobile"><i class="glyphicon glyphicon-star"></i> Jarvis</a>
    <a id="activeTagcloud" href="?do=tagcloud"><i class="glyphicon glyphicon-tags"></i> tags</a>
    <a id="activePicwall" href="?do=picwall<?php echo $searchcrits;?>"><i class="glyphicon glyphicon-picture"></i> images</a>
    <a href="?do=about"><i class="glyphicon glyphicon-info-sign"></i> à propos</a>
    <!--<a href="http://" class="cachemoi"><i class="glyphicon glyphicon-envelope"></i> menu 3</a>-->
    <a href="<?php echo $feedurl;?>?do=rss<?php echo $searchcrits;?>" class="nomobile"><img src="tpl/./../images/feed-icon-fa.png" alt="rss"> rss</a>
<?php if( isLoggedIn() ){ ?>

    <style TYPE="text/css">.cachemoi {display:none;}</style>
    <a id="activeAddlink" href="?do=addlink"><i class="glyphicon glyphicon-link"></i>  nouveau lien</a>
    <a id="activeOptions" href="?do=tools"><i class="glyphicon glyphicon-wrench"></i> options</a>
    <a href="?do=logout"><i class="glyphicon glyphicon-log-out"></i> logout</a>
    <?php }elseif( $GLOBALS['config']['OPEN_SHAARLI'] ){ ?>

    <a id="activeOptions" href="?do=tools">options</a><a href="?do=addlink"><i class="glyphicon glyphicon-link"></i> nouveau lien</a>
<?php }else{ ?>

    <a id="activeLogin" href="?do=login"><i class="glyphicon glyphicon-log-in"></i> login</a>
<?php } ?>

<?php } ?></div>
    <div class="clear"></div>
