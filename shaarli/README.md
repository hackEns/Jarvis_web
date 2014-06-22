#AlbinoMouse pour Shaarli#
par alexis j - https://liens.effingo.be/

AlbinoMouse pour Shaarli est directement inspiré du thème AlbinoMouse pour WordPress développé par Stefan Brechbühl (http://www.pixelstrol.ch/en/wp-themes/albinomouse/).

Tous les fichiers du dossier /tpl ont été adaptés au thème; le CSS est également adapté aux smartphones, au bookmarklet et au plugin pour firefox. 

Démo (frontend) sur mon Shaarli: https://liens.effingo.be

Dépôt GitHub : https://github.com/alexisju/Shaarli-AlbinoMouse/

Téléchargement : https://github.com/alexisju/Shaarli-AlbinoMouse/archive/master.zip

L'archive est prête à l'emploi et inclu l'installation de Shaarli. Vous pouvez bien sûr copier uniquement les fichiers AlbinoMouse sur votre installation.

###Fichiers supplémentaires à une nouvelle installation de Shaarli:###
  - le CSS AlbinoMouse 
	(ici dans le fichier /inc/albinomouse.css)
  - les fichiers templates Albinomouse
	(tous les fichiers du répertoire /tpl)
  - les polices Bitter et OpenSans
	(ici dans le dossier /inc/fonts)
  - la police [Glyphicons Halflings](http://glyphicons.com/) extraite du [framework Bootstrap](http://getbootstrap.com) (utilisée pour afficher les icônes). 
	(ici dans le dossier /inc/boostrap-glyphicons.css et polices Glyphicons dans /inc/font. Les CSS chargées depuis le fichier /tpl/daily.html)
  - les librairies [jQuery datepicker] (http://jqueryui.com/datepicker/) permettant de naviguer de date en date avec l'ajout d'un calendrier sur daily.html 
	(les js sont appelés depuis le fichier /tpl/daily.html, les fichiers jquery (custom) sont dans /inc/jquery/, les CSS sont intégrées au /inc/albinomouse.css)
  - certaines icones dans le dossier /images/
	
###Fonctionnalités supplémentaires incluses ET conseils d'installation:###
  - ajout d'un mode de navigation de date en date via un calendrier dont les dates sont limitées à la création de votre premier lien jusqu'à la date d'aujourd'hui.
	(remarque : il faut indiquer manuellement la date de création de votre premier lien au format iso dans le fichier /tpl/daily.html à la ligne qui commence par minDate (par exemple, la configuration actuelle est fixée au 12 janvier 2009)
  - partage social : le thème inclut des liens de partage social sans tracking pour Twitter, Facebook, Google+, LinkedIn, Pinterest, Scoop.it, mailto (et WordPress si votre session est active). 
	(remarque : vous pouvez adapter l'url de votre site WordPress et votre identifiant Twitter dans le fichier /tpl/linklist.html;
  - boutons d'édition et de suppression à chaque entrée de l'affichage de /tpl/daily.html;
  - champs de recherches libres ou par tags présents sur toutes les pages de contenu (pages linklist,daily,picwall,tagcloud.html)

###Et en bonus un index.php customizé. Liste des modifications:###
  - forcage du français pour l'affichage de la date;
  - suppression de la virgule dans l'affichage de la date;
  - suppression automatique des attributs ajoutés par facebook dans les URLs;
  - taille maximum des entrées du nuage de tag augmentée.

Ces modifications sont commentées "//AlbinoMouse"

###Licences open sources:###
  - AlbinoMouse : [Licence GPLv3] (/Licence GPLv3 - AlbinoMouse - license.txt)
  - Shaarli, Seb Sauvage : [Licence zlib/libpng] (/Licence Zlib-Libpng - Shaarli.txt)
  - Bootstrap Framework, Twitter (http://getbootstrap.com)  : [Licence MIT] (https://github.com/twbs/bootstrap/blob/master/LICENSE)
  - jQuery : [Licence MIT] (/inc/jquery/jquery-MIT-LICENSE.txt)
  - Police Glyphicons Halflings (http://glyphicons.com/) : même licence que Bootsrap.
  - Police OpenSans : [Apache License] (/inc/fonts/OpenSans - Apache License.txt)
  - Police Bitter : [Licence SIL OFL] (/inc/fonts/Bitter - SIL Open Font License.txt)
  - Font Awesome de Dave Gandy : [Licence SIL OFL] (http://fontawesome.io/license/)


