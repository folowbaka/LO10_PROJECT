# lo10_project

Documentation de Symfony : https://symfony.com/doc/current/setup.html
### Prerequisites
* PHP 7.1 minimum (Est installé avec la dernière version de Wamp si vous l'utilisez).
* Composer d'installé : https://symfony.com/doc/current/setup/composer.html
### Installing
Dans le repertoire cloné , utiliser la commande :
```
composer install
```
Composer téléchargera et installera toute les dépendances pour le projet.

### Utilisation de Wamp
Comme indiqué dans la documentation, Symfony 4 vient avec son propre serveur de développement ( pas besoin de Wamp par exemple).Cependant si vous voulez utiliser Wamp (ou un autre crétinus), vous trouverez la procédure ci-dessous (pour windaube mouchard edition).

* Clic Gauche sur l'icone de Wamp
* Cliquez sur "Vos VirtualHosts"
* Cliquez sur "Gestion VirtualHost"
* Le navigateur choisi pour Wamp ouvre une nouvelle page

Le nom du Virtual host est ce qui remplacera "localhost" pour accéder à votre projet, exemple : lo10dev
 
Le chemin du Virtual host doit pointé sur le répertoire "public" du projet, exemple : C:\wamp\www\lo10\public

Redémarrez Wamp.

Vous devriez accéder à la page d'accueil du site avec l'url suivante http://nomVirtualHost, exemple : http://lo10dev/

Cependant la barre de debug de Symfony ne fonctionnera normalement pas.
* Ouvrez le fichier "C:\wamp\bin\apache\apache"version"\conf\extra\httpd-vhosts.conf"
* Ajoutez entre les balises Directory de votre VirtualHost :
```
<IfModule mod_rewrite.c>
        Options -MultiViews
        RewriteEngine On
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteRule ^(.*)$ index.php [QSA,L]
</IfModule>
```
Redémarrez Wamp

**Si vous avez une erreur PHP sur la page, vérifiez que wamp utilise la bonne version de PHP !**
