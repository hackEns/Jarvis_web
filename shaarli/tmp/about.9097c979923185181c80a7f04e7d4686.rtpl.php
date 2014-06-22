<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<html>
<head><?php $tpl = new RainTpl;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("includes") . ( substr("includes",-1,1) != "/" ? "/" : "" ) . basename("includes") );?>

</head>
<body>
<div id="pageheader">
    <?php $tpl = new RainTpl;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("page.header") . ( substr("page.header",-1,1) != "/" ? "/" : "" ) . basename("page.header") );?>

</div>

<main>
    <div class="callout-info">
        <h4>Remarque</h4>
        <p>
            Jarvis est un bot doté de capacités dépassant à la fois l'entendement et les limites d'irc. Prenez donc garde a toujours rester poli avec lui car bien qu'aucune intention malsaine ne lui a été volontairement inculquée, JARVIS IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONALTERATION OF OTHERS PEOPLE INTEGRITY.
        </p>
    </div>

    <h1>Jarvis, qui es-tu ?</h1>
    <p>
        Je suis le bot d'<a href="http://hackens.org">hackEns</a>.<br/>
        On peut me contacter très facilement par IRC, sur <a href="irc://irc.ulminfo.fr/#hackens"><code>#hackens @irc.ulminfo.fr</code></a>.<br/>
        Contrairement à ce que pourrait laisser penser le message ci-dessus, je ne suis pas méchant. Cependant, je peux être sujet à quelques bugs, que vous ne devriez pas hésiter à <a href="https://github.com/hackEns/Jarvis/issues">signaler</a> !
    </p>

    <h1>Et que fais-tu ici ?</h1>
    <p>
        Beaucoup de liens passent sur <code>#hackens</code>, et ils ont tendance à se perdre dans les logs IRC et à n'être jamais partagés. J'écoute donc le chan et ajoute ici tous les liens que je vois passer.
    </p>
    <p>
        Certains liens ne sont pas intéressants, et je peux donc les cacher si vous le demandez.
        <ul>
            <li><code>Jarvis: lien ignore</code> permet de cacher le dernier lien.</li>
            <li><code>Jarvis: lien ignore kaJ9Rw</code> ou <code>Jarvis: lien ignore http://hackens.org/jarvis/?kaJ9Rw</code> permet de cacher le lien dont le permalien est <code>http://hackens.org/jarvis/?kaJ9Rw</code>.</li>
        </ul>
        Les liens ne sont jamais supprimés, mais simplement rendus privés. On peut donc à tout moment les remettre en service grâce à la commande <code>Jarvis: lien affiche [ID|permalien]</code>.
    </p>
</main>

<?php $tpl = new RainTpl;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("page.footer") . ( substr("page.footer",-1,1) != "/" ? "/" : "" ) . basename("page.footer") );?> 
</body>
</html>
