# Portfolio

## Etapes réalisées :
### Installations et configurations

- <u> Installation Bedrock : </u>

  Mise en place de WordPress avec Bedrock via Composer.
  Configuration des dépendances dans composer.json.

- <u> Configuration de l'environnement :</u>

  Création et remplissage du fichier .env avec les informations de la base de données (DB_NAME, DB_USER, DB_PASSWORD).
  
- <u> Changement des thèmes :</u>

  Ajout d’un thème parent et création d’un thème enfant dans web/app/themes/blocksy-child/.
  Modification des fichiers via VSCode

### Création du CPT Portfolio

- Ajout du fichier cpt-portfolio.php :

    Création du fichier dans le thème enfant (web/app/themes/blocksy-child/cpt-portfolio.php).
  
- Déclaration du CPT :
  
    Support du titre, éditeur, et image mise en avant ('supports' => array('title', 'editor', 'thumbnail')).
    Catégories personnalisées (portfolio_category) via register_taxonomy.
    Permalien personnalisé (/portfolio/nom-de-la-réalisation/) avec 'rewrite' => array('slug' => 'portfolio').
  
- Support des images mises en avant :

Ajout de add_theme_support('post-thumbnails') dans functions.php.

- Enregistrement du cpt :

Inclusion de cpt-portfolio.php dans functions.php avec require_once

### Ajout des Champs Personnalisés avec ACF

- Installation d'ACF :

Ajout via Composer : composer require wpackagist-plugin/advanced-custom-fields.
Activation manuelle dans l’admin et via config/application.php

- Création d'un groupe de champs :

  Nouveau groupe "Portfolio - Détails" dans ACF avec :
    Champ "Client" (Texte, portfolio_client).
    Champ "Date de réalisation" (Date, portfolio_date).
    Champ "Lien du projet" (URL, portfolio_link).
    Champ "Galerie d’images" (Répéteur avec sous-champ Image, portfolio_gallery) — simplifié sans galerie finale (option payante).
Assignation au CPT "portfolio" via la règle d’emplacement.

- Correction de l'onglet ACF :

Vérification que l’onglet "ACF" apparaissait au lieu de "Champs personnalisés".

### Affichage des réalisations 

- Création de single-portfolio.php :

  Fichier créé dans le thème enfant pour afficher une réalisation individuelle.
  Affichage du titre, contenu, et champs ACF (client, date, lien).

- Création de archive-portfolio.php :

  Utilisation de la boucle WordPress avec image mise en avant, titre, et client.
  
- Personnalisation des styles :

  Ajout de CSS dans style.css pour une mise en page responsive :
  Styles pour single-portfolio.php (détails et contenu).
  Styles pour archive-portfolio.php.

### Création de la Homepage :

- Création d'une page statique :

  Ajout d’une page "Accueil" dans l’admin et configuration comme page d’accueil dans Réglages > Lecture.
    
- Développement de front-page.php :

  Création du fichier dans le thème enfant.
  Ajout de sections :
    Présentation de l’étudiant (texte statique).
    Liste des compétences (liste statique).
    Section "Mes meilleures réalisations".

- Ajout d’un champ ACF pour les réalisations mises en avant :

  Champ "Mis en avant" (Vrai/Faux, portfolio_realisations) ajouté au groupe "Portfolio - Détails".
  Assignation au CPT "portfolio".
  
- Requête pour les meilleures réalisations :

  Utilisation de WP_Query dans front-page.php pour récupérer 3 projets où portfolio_realisations = 1.
  Affichage en grille avec image, titre, et client.

- Débogage et correction :

  Résolution du problème d’affichage (nom du champ corrigé de portfolio_featured à portfolio_realisations).
  
- Styles responsive :

  Ajout de CSS dans style.css pour la homepage (hero, skills).

## Difficultés rencontrées :

Lors de l'installation et configuration, à l'origine avec XAMPP et PhpStorm, une multitude d'erreurs ont surgit. M'obligeant à désinstaller xampp et partir sur MySQL Shell et VSCode. J'ai passé plus de temps à tout configurer et installer les dépendances qu'à véritablement faire le portfolio.

## Installer et lancer le projet
- Prérequis :
    PHP : version 7.4 ou plus
    MySQL : version 5.7 ou plus
    Composer : pour gérer les dépendances
    Git : pour cloner le répertoire
    Accès à un terminal.

- Etapes d'installation :
  
      Clonez le répertoire :

            https://github.com/noctandc/portfolio.git
  
            Naviguez dans le dossier du projet : cd nocta-portfolio
  
      Installez les dépendances :
  
            composer install
  
      Configurez une base donnée : Accédez à phpMyAdmin http://localhost:8008/phpmyadmin
                                  Ou MySQL Shell et rentrer le script de base de donnée 
      Configurer le fichier .env : cp .env.example .env
                                  Ouvrir le .env et remplir les informations suivantes :
                                  DB_NAME=nocta_portfolio_db           # Nom de la base créée
                                  DB_USER=root            # Utilisateur MySQL (ex. root)
                                  DB_PASSWORD=root # Mot de passe MySQL
                                  DB_HOST='localhost'           # Hôte de la base (souvent localhost)
                                  DB_PREFIX='wp_'
                                  WP_ENV='development'          # Environnement (development pour local)
                                  WP_HOME='http://localhost:8008'  # URL publique de ton site
                                  WP_SITEURL="${WP_HOME}/wp/"  # URL WordPress (avec /wp pour Bedrock)
                                  AUTH_KEY='generateme'
                                  SECURE_AUTH_KEY='generateme'
                                  LOGGED_IN_KEY='generateme'
                                  NONCE_KEY='generateme'
                                  AUTH_SALT='generateme'
                                  SECURE_AUTH_SALT='generateme'
                                  LOGGED_IN_SALT='generateme'
                                  NONCE_SALT='generateme'

- Lancer le site : après avoir activé la base de donnée, lancer dans le terminal : php -S localhost:8008 -t web
- Accès à l'administration :
-   Identifiant : root
-   Mot de passe : root
    
