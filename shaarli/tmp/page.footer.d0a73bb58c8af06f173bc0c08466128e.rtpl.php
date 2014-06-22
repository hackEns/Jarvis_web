<?php if(!class_exists('raintpl')){exit;}?>﻿<div id="footer">
    <b><a href="http://sebsauvage.net/wiki/doku.php?id=php:shaarli">Shaarli <?php echo htmlspecialchars( $version );?></a></b> - The personal, minimalist, super-fast, no-database delicious clone. By <a href="http://sebsauvage.net" target="_blank">sebsauvage.net</a> <br/>
	<a href="https://github.com/alexisju/Shaarli-AlbinoMouse" target="_blank">AlbinoMouse pour Shaarli</a> par alexis j. | thème directement inspiré de <a href="http://www.pixelstrol.ch/en/wp-themes/albinomouse/">AlbinoMouse pour WordPress</a>
</div>

<?php if( $newversion ){ ?>

    <div id="newversion"><span style="text-decoration:blink;">&#x25CF;</span> Shaarli <?php echo htmlspecialchars( $newversion );?> is <a href="http://sebsauvage.net/wiki/doku.php?id=php:shaarli#download">available</a>.</div>
<?php } ?>

<?php if( isLoggedIn() ){ ?>

<script language="JavaScript">function confirmDeleteLink() { var agree=confirm("Are you sure you want to delete this link ?"); if (agree) return true ; else return false ; }</script>
<?php } ?>

