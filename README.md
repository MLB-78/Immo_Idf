Projet Immo IDF
<br>
Présentation
<br>
Le projet Immo IDF, anciennement connu sous le nom de Immo CTMF, est un site web dédié à la publication et à la consultation d'annonces immobilières dans la région d'Île-de-France. Cette refonte vise à moderniser et à améliorer l'expérience utilisateur, ainsi qu'à fournir de nouvelles fonctionnalités pour faciliter la gestion des annonces.
<br>
Fonctionnalités clés
Gestion des Annonces: Un système CRUD (Create, Read, Update, Delete) fonctionnel a été mis en place pour permettre aux utilisateurs de gérer facilement leurs annonces. Cela inclut l'ajout, la modification et la suppression des annonces.
<br>
Filtrage des Annonces: Les utilisateurs peuvent filtrer les annonces en fonction de différents critères tels que le type de bien, le prix, la localisation, etc., pour trouver rapidement ce qu'ils cherchent.
<br>
Refonte du Design: Une refonte complète du design de la page d'accueil a été réalisée pour offrir une expérience visuelle plus attrayante et intuitive aux utilisateurs.
<br>
Pagination avec KNP Paginator: La pagination des résultats de recherche a été mise en œuvre à l'aide de KNP Paginator, ce qui permet de diviser les résultats en pages pour une navigation plus fluide.
<br>
Tests Unitaires: Des tests unitaires ont été réalisés pour garantir le bon fonctionnement des fonctionnalités et la stabilité de l'application.
<br>
Modèle Conceptuel de Données (MCD) Réorganisé: Le modèle de données a été repensé et amélioré pour mieux refléter la structure et les relations des données de l'application.
<br>
Suivi du Développement avec GIT: Le processus de développement a été suivi en utilisant Git pour assurer une gestion efficace des versions et une collaboration transparente entre les membres de l'équipe.
<br>
Technologies Utilisées
Symfony (Framework PHP)
Doctrine (ORM)
Twig (Moteur de Templates)
KNP Paginator (Pagination)
PHPUnit (Tests Unitaires)
Git (Gestion de Version)
Installation
Clonez ce dépôt sur votre machine locale.
Installez les dépendances en exécutant la commande composer install.
Configurez votre base de données dans le fichier .env.
Créez la structure de la base de données en exécutant les migrations avec la commande php bin/console doctrine:migrations:migrate.
Lancez le serveur local avec la commande symfony server:start.
Contributeurs
<br>
[MLB](https://github.com/MLB-78))
