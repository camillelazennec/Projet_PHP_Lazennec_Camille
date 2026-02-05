# OverStock

Plateforme web développée avec Laravel a destinaton des entrprises, permettant de publier, gérer et consulter des offres de surplus de produits entre entre professionels.

---

## Stack technique

* **Framework :** Laravel 12
* **Langage :** PHP 8+
* **Base de données :** MySQL
* **Front :** Blade + Tailwind
* **ORM :** Eloquent
* **Authentification :** Laravel Breeze
* **Gestion de version :** Git / GitHub

---

## 📦 Fonctionnalités

### 👤 Utilisateur

* Inscription / connexion
* Accès à un dashboard personnel
* Création d’offres
* Modification / suppression de ses offres
* Ajout d’offres en favoris
* Consultation de toutes les offres
* Modification de son profil

### 🛠️ Administrateur

* Dashboard admin
* Liste des utilisateurs
* Recherche d’utilisateurs
* Consultation d’un utilisateur
* Bannissement d’un utilisateur
* Consultation des offres publiées

### 🌐 Global

* Page d’accueil publique
* Navigation dynamique selon le rôle
* Sécurité CSRF
* Architecture MVC

---

## 🗄️ Base de données

Relations principales :

* users
* offers
* favorites (pivot)

Relations Eloquent :

* User → hasMany Offers
* User → belongsToMany FavoriteOffers
* Offer → belongsTo User

---

##  Installation du projet

### 1 — Cloner le projet

```bash
git clone https://github.com/camillelazennec/Projet_PHP_Lazennec_Camille.git
cd OverStock
```

### 2 — Installer les dépendances

```bash
composer install
npm install
```

### 3 — Configuration environnement

```bash
cp .env.example .env
php artisan key:generate
```

Configurer dans `.env` :

```
DB_CONNECTION=mysql
DB_DATABASE=overstock
DB_USERNAME=root
DB_PASSWORD=
```

### 4 — Migration base de données

```bash
php artisan migrate
```

### 5 — Lancer le projet

```bash
npm run dev
php artisan serve
```

Accès :

```
http://127.0.0.1:8000
```

---

## 🧠 Architecture

Projet structuré selon le pattern MVC :

* **Models :** User, Offer
* **Controllers :**

  * OfferController
  * AdminUserController
  * FavoriteController
* **Views :**

  * dashboard user
  * dashboard admin
  * home
  * offers
* **Layouts :**

  * app
  * navigation

---

## 🔐 Sécurité

* Protection CSRF
* Authentification Laravel
* Middleware admin
* Validation des formulaires
* Protection XSS via Blade

---

## 🧪 Comptes de test

### Admin

```
email: admin@overstock.test
password: password (On laisse evidament pas ce mot de passe en prod juste plus simple à taper en test)
```

### Utilisateur

```
email: baltazard@gmail.com
password: Baltazard1234 

email: iris@gmail.com
password: IrisMarlou

email: Lou@gmail.com
password: LouLou1234

email: lmcamille92@gmail.com
password: CamilleLazennec

```

---

## Évolutions possibles

* messagerie entre utilisateurs
* système de réservation
* notifications
* API REST
* amélioration UX / Design
