# McCusker General Engineering – WordPress Child Theme

[![Live Preview](https://img.shields.io/badge/Live%20Preview-GitHub%20Pages-blue?logo=github)](https://mcfuzzysquirrel.github.io/Mcc-eng/)

A professional WordPress child theme for **McCusker General Engineering**, built on the **Twenty Twenty-Four** parent theme. Designed for deployment at [www.mccuskerengineering.co.za](https://www.mccuskerengineering.co.za).

## 🌐 Live Preview (from the repo)

A static HTML preview of the theme is automatically published to **GitHub Pages** on every push to `main`.

**[👉 View the preview here](https://mcfuzzysquirrel.github.io/Mcc-eng/)**

| Page | URL |
|---|---|
| Home | https://mcfuzzysquirrel.github.io/Mcc-eng/ |
| Services | https://mcfuzzysquirrel.github.io/Mcc-eng/services/ |
| Contact | https://mcfuzzysquirrel.github.io/Mcc-eng/contact/ |

> **Note:** The preview is a static representation of the theme design. Dynamic WordPress features (contact form, CMS content) require a live WordPress install — see [Local Preview (Docker)](#local-preview-docker) below.

### Enable GitHub Pages (first time only)

1. Go to **Settings → Pages** in this repository.
2. Under **Source**, select **GitHub Actions**.
3. The next push to `main` will deploy automatically.

## Project Overview

This repository contains a complete WordPress child theme reflecting McCusker General Engineering's industrial branding: bold navy blue, clean typography, and a strong focus on their core engineering services.

## Repository Structure

```
/
├── README.md
├── .gitignore
├── .env.example
├── docker-compose.yml
├── .github/
│   └── workflows/
│       └── pages.yml          ← GitHub Pages auto-deploy
├── docs/                      ← Static HTML preview (GitHub Pages)
│   ├── index.html
│   ├── services/
│   │   └── index.html
│   ├── contact/
│   │   └── index.html
│   └── assets/
│       ├── css/
│       │   └── custom.css
│       └── js/
│           └── main.js
└── wp-content/
    └── themes/
        └── mccusker-engineering/
            ├── style.css
            ├── functions.php
            ├── index.php
            ├── header.php
            ├── footer.php
            ├── front-page.php
            ├── page-services.php
            ├── page-contact.php
            ├── assets/
            │   ├── css/
            │   │   └── custom.css
            │   └── js/
            │       └── main.js
            └── template-parts/
                ├── hero.php
                ├── services.php
                └── contact-cta.php
```

## Local Preview (Docker)

You can preview this site locally using Docker and Docker Compose — no hosting account needed.

### Prerequisites

- [Docker Desktop](https://www.docker.com/products/docker-desktop/) (includes Docker Compose)

### Steps

1. **Clone the repository** (if you haven't already):
   ```bash
   git clone https://github.com/McFuzzySquirrel/Mcc-eng.git
   cd Mcc-eng
   ```

2. **Set up your local environment file**:
   ```bash
   cp .env.example .env
   ```
   Edit `.env` if you want to change the database credentials (optional for local use).

3. **Start the local WordPress environment**:
   ```bash
   docker compose up -d
   ```
   This starts a MySQL database and a WordPress instance. The theme files in `wp-content/` are mounted directly into the container.

4. **Open WordPress in your browser**:
   Navigate to [http://localhost:8080](http://localhost:8080) and complete the WordPress setup wizard (choose any username/password — this is only for local use).

5. **Install the Twenty Twenty-Four parent theme**:
   In WordPress Admin → Appearance → Themes → Add New, search for **Twenty Twenty-Four** and install it (**do not activate it**).

6. **Activate the McCusker Engineering theme**:
   In WordPress Admin → Appearance → Themes, activate **McCusker Engineering**.

7. **Create pages** with the following slugs:
   - `/services` – use the "Services Page" template
   - `/contact` – use the "Contact Page" template

8. **Set the front page**: Settings → Reading → set "A static page" and choose your home page.

9. **Stop the environment** when done:
   ```bash
   docker compose down
   ```
   Your WordPress database is preserved in a Docker volume. Use `docker compose down -v` to also remove the database.

---

## Theme Installation

1. **Install WordPress** on your hosting server.
2. **Install the parent theme**: In WordPress Admin → Appearance → Themes → Add New, search for "Twenty Twenty-Four" and install it (do not activate it).
3. **Upload the child theme**: Compress the `mccusker-engineering/` folder into a `.zip` file and upload it via Appearance → Themes → Add New → Upload Theme.
4. **Activate** the McCusker Engineering child theme.
5. **Create pages** in WordPress with the following slugs:
   - `/services` – use the "Services Page" template
   - `/contact` – use the "Contact Page" template
6. **Set the front page**: Settings → Reading → set "A static page" and choose your home page.

## Required Plugins

- **Contact Form 7** – For the contact form on the Contact page.
  - Install via Plugins → Add New → search "Contact Form 7".
  - Create a form and note its ID; update the shortcode in `page-contact.php` if the ID differs from `1`.

## Color Scheme

| Variable              | Value     | Usage                          |
|-----------------------|-----------|--------------------------------|
| `--color-primary`     | `#1B3A6B` | Navy blue – main brand color   |
| `--color-secondary`   | `#D4D4D4` | Light gray – backgrounds       |
| `--color-accent`      | `#E87722` | Warm orange – CTAs, hovers     |
| `--color-white`       | `#FFFFFF` | Text on dark backgrounds       |
| `--color-dark`        | `#1a1a1a` | Body text                      |

Colors are defined as CSS custom properties in `assets/css/custom.css` and can be adjusted there.

## Typography

- **Headings**: Montserrat (Google Fonts) – bold, uppercase
- **Body**: Open Sans (Google Fonts) – clean, readable

Both fonts are loaded via `functions.php`.

## Customization Notes

- Logo and header: customizable via Appearance → Customize → Site Identity.
- Navigation menus: set up via Appearance → Menus (registers "Primary" and "Footer" locations).
- Widget areas: "Sidebar" and "Footer Widgets" registered for use.
- Modify brand colors in `assets/css/custom.css` under the `:root` block.

## Deployment Instructions

1. Set up WordPress hosting (e.g., cPanel with Softaculous, WP Engine, or similar).
2. Point your domain `www.mccuskerengineering.co.za` to your server.
3. Install WordPress, then follow the **Theme Installation** steps above.
4. Install and configure **Contact Form 7**.
5. Set up your navigation menu: Appearance → Menus → create a menu with Home, Services, and Contact items; assign to "Primary Navigation".
6. Optionally configure a custom logo via Appearance → Customize → Site Identity.

## Services

1. Aluminium and Stainless Steel Welding
2. Brazing
3. General Machining
4. Manufacturing
5. Plate Rolling

## Contact

- **Gordon** – 0734959727
- **Website**: www.mccuskerengineering.co.za