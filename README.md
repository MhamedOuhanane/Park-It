# Park'It - API REST pour la gestion des parkings

## Contexte du projet

L'objectif principal de ce projet est de développer une API REST pour la gestion des parkings. Cette API permettra aux utilisateurs de rechercher des places disponibles, de réserver une place et de suivre l'état de leurs réservations. Chaque parking sera caractérisé par son nombre total de places, permettant une gestion précise de la disponibilité.

## User Stories

### 🔒 Authentification utilisateur
En tant qu'utilisateur, je souhaite pouvoir m'authentifier sur l'API à l'aide de Laravel Sanctum.

### 🚗 Recherche de place de parking
En tant qu'utilisateur, je souhaite pouvoir rechercher une place de parking disponible dans une zone géographique spécifique, avec une indication en temps réel de la disponibilité et du nombre total de places pour chaque parking.

### 📅 Réservation de place de parking
En tant qu'utilisateur, je veux pouvoir réserver une place de parking pour une période spécifique, en précisant l'heure d'arrivée et l'heure de départ.

### 🔄 Modification et annulation de réservation
En tant qu'utilisateur, je souhaite pouvoir modifier mes réservations, y compris l'heure d'arrivée, l'heure de départ, ou annuler la réservation si nécessaire.

### ❌ Annulation de réservation
En tant qu'utilisateur, je souhaite avoir la possibilité d'annuler ma réservation en cas de changement de plans.

### 📊 Consultation des réservations
En tant qu'utilisateur, je souhaite pouvoir consulter mes réservations passées et actuelles pour suivre l'historique de mes parkings réservés.

### 🔒 Gestion des parkings par l'administrateur
En tant qu'administrateur, je souhaite pouvoir ajouter, modifier ou supprimer des parkings dans le système. Pour chaque parking, je dois pouvoir définir et mettre à jour le nombre total de places disponibles.

### 🔍 Statistiques des parkings
En tant qu'administrateur, je souhaite visualiser les statistiques liées aux parkings, comme le nombre de places disponibles, le nombre de réservations passées, etc.

### 🧪 Tests unitaires
En tant que développeur, je souhaite que des tests unitaires soient réalisés pour chaque fonctionnalité de l'API.

### 📝 Tests Postman
En tant que développeur, je veux que des tests sur Postman soient effectués pour valider le bon fonctionnement de l'API dans différents scénarios d'utilisation.

### 📄 Documentation API
En tant que développeur, je souhaite une documentation détaillée de l'API, avec une description claire de chaque endpoint, pour simplifier l'intégration par d'autres développeurs. Cette documentation sera créée à l'aide d'outils comme Postman, Swagger ou d'autres outils similaires.

---

## Fonctionnalités principales

### 1. **Authentification des utilisateurs**
- Authentification via Laravel Sanctum pour sécuriser l'accès à l'API.
  
### 2. **Gestion des parkings**
- Ajout, modification, suppression des parkings par un administrateur.
- Gestion du nombre de places disponibles pour chaque parking.

### 3. **Réservation de places de parking**
- Les utilisateurs peuvent rechercher des places disponibles par zone géographique.
- Possibilité de réserver une place pour une période donnée avec la gestion des horaires d'arrivée et de départ.

### 4. **Historique des réservations**
- Les utilisateurs peuvent consulter l'historique de leurs réservations passées et actuelles.

### 5. **Modification et annulation des réservations**
- Les utilisateurs peuvent modifier ou annuler leurs réservations selon leurs besoins.

---

## Structure de l'API

Voici une vue d'ensemble des endpoints principaux de l'API :

### 1. **POST /api/register**
- Enregistrement d'un nouvel utilisateur.

### 2. **POST /api/login**
- Authentification de l'utilisateur et génération d'un token.

### 3. **DELETE /api/logout**
- déconnexion de l'utilisateur et supprimer ses tokens.

### 4. **GET /api/parkings**
- Liste des parkings disponibles avec le nombre total de places et la disponibilité en temps réel.

### 5. **POST /api/reservations**
- Création d'une nouvelle réservation de parking.

### 6. **PUT /api/reservations/{reservations}**
- Modification d'une réservation existante.

### 7. **DELETE /api/reservations/{reservation}**
- Annulation d'une réservation.

### 8. **Delete /api/parkings/{parking}**
- Restauration d'un parking supprimé.

### 9. **GET /api/dashboard**
- Statistiques globales sur les parkings et les réservations.

---

## Technologies utilisées

- **Backend** : Laravel 12
- **Base de données** : PostgreSQL
- **Authentification** : Laravel Sanctum
- **Tests** : PHPUnit, Postman
- **Documentation** : Postman

---

## Livrables pour le projet Park'It

Date limite de soumission : **14/03/2025 à Minuit**

### 1. Lien vers le repository GitHub

[https://github.com/exemple/Park-It.git](https://github.com/MhamedOuhanane/Park-It.git)

Ce lien contient le code source complet du projet, incluant tous les fichiers nécessaires à son fonctionnement.

### 2. Lien vers le plan de projet (JIRA)

[https://jira](https://mhamde.atlassian.net/jira/software/projects/PI/boards/81?atlOrigin=eyJpIjoiMWQxMjYxZmNkNDMyNGFiODllYTJiOGQ3NjIwNTA4NzgiLCJwIjoiaiJ9)

Ce lien contient la planification détaillée du projet, y compris les tâches et les jalons.
