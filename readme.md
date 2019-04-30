

<p>Vous êtes le blog d’un Projet scolaire réalisé par Malo </p>
<div>
<h2>Guide d’installation du projet </h2>
 <ol>
  <li>Vous devez avoir installé Composer pour faire tourner un projet Laravel</li>
  <li> A l’aide de la commande  <code> git clone lienduprojetFourniParGitHub </code>  cloner le projet sur votre Machine</li>
   <li>La base de donnée utilisé pour se projet étant Sqlite , vous devez disposer de Sqlite sur votre poste</li>
   <li>Creer un fichier .env et recopier le contenu correspondant ci-dessous dans le fichier dans .env  faites de même pour le fichier .env.example  </li>
  
  <li>Ouvrez le fichier .ENV à la racine du projet pour configurer la base de donnée. La configuration consiste à changer dans .ENV , la valeur de la variable DB_DATABASE. Remplacez DB_DATABASE par le : <code> chemin qui mène vers le répertoireduprojet/database/database.sqlite </code>  . </li>
  
 <li>Sur votre terminal allez à la racine du projet et lancez la commande :<code> php artisan key:generate</code> pour générer une clé puis la commande <code>  php artisan migrate:fresh --seed</code>. Cette commande permettra d’initialiser la base de donné en la remplissant avec des données aléatoires ( Des utilisateurs, des posts et des commentaires par posts)</li>
  <li>
 Faite ensuite la commande la commande : php artisan serve pour démarrer le serveur. Vous devez pouvoir accéder à la page Home du blog en copiant le lien généré par cette commande dans votre navigateur.</li>
  

  

  


  
 


</ol>

 <br>
 </div>
  <h3> fichier env.</h3>
 <pre>

 APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:CZ44NIMO8ed0hs6yT1M/RAxmEFAcSG5Mak09BAg4NN0=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=sqlite
#DB_HOST=127.0.0.1
#DB_PORT=3306
DB_DATABASE=/home/dcissm2rs/kouchoae/Bureau/blog/database/database.sqlite
#DB_USERNAME=root
#DB_PASSWORD=ic2a

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

 </pre>
 </div>
 <h3> env.example</h3>
 <pre>
 APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

 </pre>
 <h3> .editor.config </h3>
 <pre>
 root = true

[*]
charset = utf-8
end_of_line = lf
insert_final_newline = true
indent_style = space
indent_size = 4
trim_trailing_whitespace = true

[*.md]
trim_trailing_whitespace = false

[*.yml]</pre>
<h2> Interface du blog </h2>I
Le blog utilise un système d’authentification qui distingue trois type d’utilisateurs. Un utilisateur non connecté ,  un utilisateur  simple connecté et un administrateur. Les possibilités d’interaction avec le blog varient donc en fonction du type d’utilisateur. Dans le menu de la page vous avez 4 section : La section Home, Articles Contact, Admin et Users. 



<strong>Home:</strong> Le Home affiche le titre et le contenu des 3 derniers articles publiez sur le blog . La photo du dernier article et un cadre de photo par défaut est affiché en dessous du titre de ce dernier. Tout les types d’utilisateur ont accès au Home.
<strong>Articles: </strong>La section article présente tout les articles du blog afficher par ordre de publication. Seul les titres sont affichés. Les titres affichés sont des liens cliquables qui permettent d’accéder au contenu de l’article et de certains détails de l’article comme sa photo , son auteur et sa date de publication .  L’affichage du bas de bas de la liste des articles varie selon le type d’utilisateur. Pour un utilisateur non connecté il y a un bouton ajouter un article en rouge qui n’est pas cliquable. Donc un utilisateur non connecté ne peut pas créer un article. Un utilisateur connecté qu’il soit administrateur où non à deux boutons cliquables le premier pour créer un article et le deuxième pour avoir accès aux boutons CRUD de ses articles . Grâce à ce bouton il peut modifier ou supprimez ses articles. L’utilisateur non connecté n’a aucune possibilité de modifier où supprimer les articles qui ne sont pas sien. 
Affichage utilisateur connecté


<strong>Contacts:</strong> Tout le monde à accès à cette section  dans laquelle se trouve un formulaire qui permet de prendre contact. En dessous du formulaire se trouve la liste des contacts. En cliquant sur le lien des contacts vous pouvez accéder aux contenu des contacts. 

<strong>Admin:</strong> Cette section est réserve seulement aux administrateur qui peuvent modifier où supprimer tout les articles. 
Users: Cette section est réservé seulement aux administrateur. Sur cette page on peut voir la liste de tout les utilisateurs avec leurs rôles et deux boutons supprimer et faire administrer. Le bouton faire administrer. Le rôle des administrateur est en vert tandis-que que celui des utilisateur est en rouge. Quand supprimer est en rouge c’est qu’on ne peut plus supprimer cette utilisateur dont le rôle est administrateur. Un administrateur peut supprimer un utilisateur simple. Tout les administrateurs ont les mêmes droits et il ne peuvent pas se supprimer entre eux. Le bouton Faire Administrer permet de transformer un utilisateur simple en administrateur par un changement de rôle. 






<h2>Test du blog </h2>
<ol>
  <li> Connectez-vous en cliquant sur le bouton « Connexion» en haut à gauche et en utilisant  comme email: admin@gmail.com' et comme mot de <strong>pass:admin'</strong>. Cet premier administrateur a été généré dans UserSeeder. Une fois connecté en tant qu’administrateur , vous avez accès à toutes les fonctionnalités du site et vous pouvez voir l’état initial.</li>
  <li>Allez dans la section Article ou Admin puis cliquez sur article pour voir son contenue. En bas de la page de chaque article vous avez un bouton gérez commentaire qui peuvent vous permettre de d’autoriser , de bloquer , de modifier ou de supprimer les commentaires de cet article. Si l’article sur lequel vous êtes n’a pas de commentaire , créer en un avec le formulaire en bas de la page. L’autorisation et le blocage d’un commentaire est gérer par une modification du style css. Vous verrez que les commentaires autorisés sont s’affiche maintenant en dessous du contenu de l’article. Vous pouvez retourner les bloquer pour constater leur disparition.</li>
   <li>
Dans la session Admin , modifiez et supprimez un article .</li>
 
  <li>Déconnectez vous et créer deux à trois compte utilisateurs.</li>
    <li> Re-explorez les différentes sections en tant qu’utilisateur non administrateur.</li>
<li>
 Reconnectez-vous en tant qu’administrateur</li>
 <li>Allez dans la section User , nommez un des utilisateurs que vous avez créez administrateur avec le bouton FaireAdministrer. Supprimez </li>
</ol>
</div>
