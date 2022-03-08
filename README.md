# ProjetPHP

--- L'équipe de la Table Ronde ---

BOURGES Laetitia
CARESSA Audrey
HOCQUET Florian
LEJEUNE Gael

-- URL du site WEB --

http://latableronde.alwaysdata.net/projetphp/controller/index.php


--- Notre projet ---

En ce qui concerne notre projet, nous avons dû réaliser un réseau social que nous avons choisi d’appeler FreeNote.
Il permet notamment de créer des discussions interactives où chaque utilisateur ne peut envoyer qu’un ou deux mots maximum par message.
Notre site est composé d'une page d'accueil sur laquelle nous pouvons accéder à différentes discussions. 
Cependant pour cela, il est nécessaire de se créé un compte afin de pouvoir consulter son profil ou poster des messages.
Des options sont possibles pour pouvoir modifier son login ou son mot de passe.
Il existe différents rôles liés à notre site, qui sont les suivants : administrateur, membre FreeNote et public.
L'administrateur possède tous les droits, le membre FreeNote dispose d'un compte et de privilèges limités et public peut seulement lire les discussions mais ne pas les modifier.


--- Nos choix techniques ---

Pour la réalisation de notre site, nous avons utilisé PHP, mySQL, HTML et CSS.
Nous avons utilisé une architecture MVC (Modèle Vue Controller), et nous avons donc réparti le contenu dans des dossiers dédiés comme suit

-class (les classes classe PHP)
-controller (les controllers PHP)
-html
    -css (les feuilles de style css)
    -images (ne contient ici que le favicon)
-java (pour le script de la navbar)
-model (pour les modèles PHP)
-processing (pour les fichiers PHP contenant le code traitant les formulaires)
-view (pour les vues en PHP et HTML)
index.php (redirige vers le controller d'index)
ParamsAdmin.txt (contient les paramètres de pagination et de discussion ouvertes modifiable par l'admin)

Nous avons adopté l'architecture suivante car elle permet de travailler plus efficacement en groupe et de permettre une plus grande maléabilité.

Nous avons aussi utilisé des fichiers ".inc.php"
"link.inc.php" qui contient l'integralité des liens vers les pages et fichiers du site stockeés sous forme de variable afin de permettre un code dynamique et maléable.
"utils.inc.php" qui contient les fonctions start_page($title, $lien1, $background) et end_page() qui permettent de créer l'entête et la fin des pages html
"dtb.inc.php"  qui contient l'integralité des fonctions concernant la base de donnée en PDO.


-- Configuration logicielle --

Minimale : Internet Explorer 11
Conseillé : Les dernières versions de Google Chrome et Firefox

-- Mesures de sécurité mises en oeuvre --

Nous avons d'abord encodé les mdp d'utilisateurs en md5 dans la base de donnée afin de les stocker cryptés, ainsi, lorsqu'un utilisateur à besoin d'un nouveau mdp, celui ci est généré aléatoirement et lui est envoyé par mail.
Aussi, nous avons utilisé la fonction htmlentities afin d'eviter les injections via les formulaires du site.
