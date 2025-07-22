# OCP E-Commerce Site

Un site e-commerce moderne développé en PHP avec une interface utilisateur élégante et des fonctionnalités avancées.

## 🚀 Fonctionnalités

### 🛍️ **Shopping**
- Catalogue de produits avec pagination
- Recherche en temps réel
- Panier d'achat interactif avec localStorage
- Système de commandes complet

### 👤 **Utilisateurs**
- Inscription et connexion sécurisées
- Historique des commandes avec statistiques
- Gestion de session

### 🎨 **Interface**
- Design moderne et responsive
- Animations fluides et micro-interactions
- Notifications toast
- États de chargement

## 📁 Structure du projet

```
ocp_site/
├── assets/
│   ├── css/
│   │   └── style.css          # Styles CSS modernes
│   └── js/
│       └── script.js          # JavaScript interactif
├── config/
│   └── database.php           # Configuration base de données
├── database/
│   ├── schema.sql            # Structure de la base de données
│   └── sample_data.sql       # Données d'exemple
├── includes/
│   ├── header.php            # En-tête du site
│   └── footer.php            # Pied de page
├── api/
│   └── store_cart.php        # API pour le panier
├── index.php                 # Page d'accueil
├── login.php                 # Page de connexion
├── signup.php                # Page d'inscription
├── cart.php                  # Page du panier
├── purchase_history.php      # Historique des achats
├── checkout.php              # Validation de commande
└── logout.php                # Déconnexion
```

## 🛠️ Installation

1. **Cloner le projet**
   ```bash
   git clone [votre-repo]
   cd ocp_site
   ```

2. **Configuration de la base de données**
   - Créer une base de données MySQL nommée `ocp_shop`
   - Importer le schéma : `database/schema.sql`
   - Importer les données d'exemple : `database/sample_data.sql`

3. **Configuration**
   - Modifier `config/database.php` avec vos paramètres de base de données
   - Configurer votre serveur web (Apache/Nginx) pour pointer vers le dossier `ocp_site`

4. **Démarrer le serveur**
   ```bash
   # Avec PHP built-in server
   cd ocp_site
   php -S localhost:8000
   ```

## 🗄️ Base de données

### Tables principales :
- **users** : Utilisateurs du site
- **products** : Catalogue des produits
- **orders** : Commandes passées
- **order_items** : Détails des commandes

## 🎯 Fonctionnalités techniques

### Frontend
- **CSS moderne** : Gradients, animations, responsive design
- **JavaScript ES6+** : Gestion du panier, recherche, notifications
- **LocalStorage** : Persistance du panier côté client

### Backend
- **PHP 7.4+** : Programmation orientée objet
- **PDO** : Accès sécurisé à la base de données
- **Sessions** : Gestion de l'authentification
- **Validation** : Sécurisation des formulaires

## 🔐 Sécurité

- Hachage des mots de passe avec `password_hash()`
- Protection contre les injections SQL avec PDO
- Validation des données côté serveur et client
- Gestion sécurisée des sessions

## 📱 Responsive Design

Le site s'adapte automatiquement à tous les types d'écrans :
- **Mobile** : Navigation optimisée, grille adaptative
- **Tablette** : Mise en page équilibrée
- **Desktop** : Expérience complète avec toutes les fonctionnalités

## 🎨 Design System

### Couleurs
- **Primaire** : #004f3c (Vert OCP)
- **Secondaire** : #006b52
- **Accent** : #00a86b
- **Succès** : #28a745
- **Erreur** : #dc3545

### Typographie
- **Police** : Segoe UI, système
- **Hiérarchie** : H1-H6 avec échelle modulaire
- **Espacement** : Système basé sur 8px

## 🚀 Améliorations futures

- [ ] Système de paiement (Stripe/PayPal)
- [ ] Gestion des stocks
- [ ] Système de reviews/notes
- [ ] Panel d'administration
- [ ] API REST
- [ ] PWA (Progressive Web App)
- [ ] Notifications push
- [ ] Multi-langues

## 📞 Support

Pour toute question ou problème :
- Email : support@ocpshop.ma
- Téléphone : +212 123 456 789

---

**Développé avec ❤️ au Maroc pour OCP**