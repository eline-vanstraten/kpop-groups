# 🎤 K-Pop Groups

Een webapplicatie gebouwd met het Laravel MVC-framework. De applicatie biedt een overzichtelijk manier om K-pop groepen
te bekijken en te beheren.

# Technologieën

- Laravel (MVC Framework)
- Laravel Breeze (authenticatie)
- PHP
- MYSQL / database
- Blade templating engine
- Eloquent ORM
- Tailwind CSS
- Git en Github

# ✦ Functies

- Groepen bekijken
- Nieuwe groepen toevoegen, bewerken en verwijderen
- Diepere validatie bij groepen bewerken
- Zoeken en filteren op groep type en/of entertainment bedrijf
- Admin (groepen (in)actief zetten)

# Architectuur

De applicatie is gebouwd volgens het MVC-patroon:

- Models
- Views
- Controllers

# Beveiliging

Tijdens de ontwikkeling is rekening gehouden met:

- OWASP-richtlijnen
- OTAP-omgeving

# Installatie en gebruik

1. Clone de repository:

```sh
git clone https://github.com/eline-vanstraten/kpop-groups.git
```

2. Ga naar de map:

```sh
cd kpop-groups
```

3. Installeer dependencies:

```sh
composer install
npm install
```

4. Start de development server:

```sh
npm run dev
```

5. Maak een .env bestand:

```sh
cp .env.example .env
```

6. Genereer app key:

```sh
php artisan key:generate
```

7. Run migraties:

```sh
php artisan migrate
```

## ✦ Auteur

Eline van Straten
