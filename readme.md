Projet : Gestion des Réservations pour un Restaurant
    Ce projet est une application web simple permettant aux utilisateurs de voir les menus disponibles et de réserver une table dans un restaurant. Il comprend des fonctionnalités pour les clients et l'administration du restaurant.

Fonctionnalités Principales

    # Côté Client :
        + Affichage des menus disponibles.
        + Formulaire de réservation pour :
            * Sélectionner un menu.
            * Choisir une date, une heure et un nombre de personnes.
        + Consultation de leurs réservations.

    # Côté Admin :
        + Gestion des menus (ajout, modification, suppression).
        + Consultation des réservations avec les détails.
        + Changement des statuts des réservations (confirmé, en attente, annulé).

    # Prérequis
        + Serveur Web : Apache ou Nginx.
        + PHP : Version 7.4 ou supérieure.
        + Base de données : MySQL ou MariaDB.
        + Navigateurs : Google Chrome, Mozilla Firefox, ou tout navigateur récent.

    # Installation

        1-Clonez le dépôt :
            git clone https://github.com/votre-utilisateur/votre-projet.git
        2-Configurez la base de données :
            Importez le fichier database.sql dans votre serveur MySQL.
            Mettez à jour les informations de connexion dans le fichier connection.php 
        3-Déplacez les fichiers dans le dossier racine de votre serveur web (ex. : htdocs pour XAMPP).
        4-Accédez au projet dans votre navigateur :
        http://localhost/votre-projet/

    # Structure des Fichiers
        + client/ : Contient les pages pour les utilisateurs (formulaire de réservation, profil).
        + chef/ : Contient les pages pour l'administration (gestion des menus, consultation des réservations).
        + includes/ : Contient les éléments réutilisables (header, footer, navigation).
        + public/ : Contient les pages publiques (page d'accueil, inscription, connexion).

    # Exemple de Base de Données

        Tables principales :
            + client : Stocke les informations des utilisateurs.
            + menu : Liste des menus disponibles.
            + reservation : Contient les réservations effectuées par les clients.

        Technologies Utilisées
            + Frontend : HTML, Tailwind CSS.
            + Backend : PHP (avec mysqli pour la connexion à la base de données).
            + Base de données : MySQL.

    # Fonctionnement
        + Les clients s’inscrivent et se connectent.
        + Ils visualisent les menus et réservent une table via le formulaire.
        + Les administrateurs gèrent les menus et les réservations depuis le tableau de bord admin.

    Auteur
    Ce projet a été réalisé par [BAHSI Ilyas].