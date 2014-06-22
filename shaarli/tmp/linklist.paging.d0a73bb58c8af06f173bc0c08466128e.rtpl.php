<?php if(!class_exists('raintpl')){exit;}?><div class="paging">

    <div id="paging_mode">
    vue : <a href="/?" alt="Linklist">liste</a> | <a href="/?do=daily" alt="Daily">daily</a>
    <?php if( isLoggedIn() ){ ?>

        | <a href="/?privateonly">
		<?php if( $privateonly ){ ?>

		tous les liens
		<?php }else{ ?>

		liens privés
		<?php } ?>

		</a>
		<?php } ?>

    </div>

    <div id="paging_linksperpage">
        Liens par page : <a href="?linksperpage=20">20</a> <a href="?linksperpage=50">50</a> <a href="?linksperpage=100">100</a>
        <form method="GET" style="display:inline;" class="linksperpage"><input type="text" name="linksperpage" size="2" style="height:15px;"></form>
    </div>
    <?php if( $previous_page_url ){ ?> <a href="<?php echo $previous_page_url;?>" id="paging_older"><i class="glyphicon glyphicon-circle-arrow-left"></i>&nbsp;&nbsp; plus anciens</a> <?php } ?>

    <div id="paging_current">page <?php echo $page_current;?> / <?php echo $page_max;?> </div>
    <?php if( $next_page_url ){ ?> <a href="<?php echo $next_page_url;?>" id="paging_newer">plus récents &nbsp;&nbsp;<i class="glyphicon glyphicon-circle-arrow-right"></i></a> <?php } ?>

</div>