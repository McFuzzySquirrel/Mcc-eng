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
| Gallery | https://mcfuzzysquirrel.github.io/Mcc-eng/gallery/ |
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
│   ├── gallery/
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
            ├── page-gallery.php
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
   - `/gallery` – use the "Gallery Page" template
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
   - `/gallery` – use the "Gallery Page" template
   - `/contact` – use the "Contact Page" template
6. **Set the front page**: Settings → Reading → set "A static page" and choose your home page.
7. **Update your navigation menu**: Appearance → Menus → add Home, Services, Gallery, and Contact; assign to "Primary Navigation".

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
5. Set up your navigation menu: Appearance → Menus → create a menu with Home, Services, Gallery, and Contact items; assign to "Primary Navigation".
6. Optionally configure a custom logo via Appearance → Customize → Site Identity.

## Gallery (Project Showcase)

The theme includes a built-in **Gallery** page for showcasing completed jobs with images and videos. Projects are managed via a custom post type in the WordPress admin.

### How Admins Upload Gallery Content

1. In the WordPress dashboard, go to **Projects → Add New**.
2. Enter a **title** for the project (e.g., "Stainless Steel Handrail").
3. Set a **Featured Image** (this is the photo displayed in the gallery grid).
4. Optionally add a description in the editor area.
5. In the right sidebar, assign one or more **Project Categories** (e.g., Welding, Machining, Manufacturing). Create new categories as needed.
6. To include a **video**, paste a YouTube embed URL in the **Project Video URL** field in the sidebar (e.g., `https://www.youtube.com/embed/VIDEO_ID`).
7. Click **Publish**.

The gallery page automatically displays all published projects in a filterable grid. Visitors can filter by category and click to view images or videos in a lightbox overlay.

### Managing Categories

- Go to **Projects → Categories** to create, edit, or delete project categories.
- Categories appear as filter buttons on the gallery page.
- Only categories with at least one published project are shown.

## Uploading the Theme to Your WordPress Site

Follow these steps to take the project files from this repository and deploy them to a live WordPress site.

### Step 1 – Download the Theme Files

1. Clone or download this repository:
   ```bash
   git clone https://github.com/McFuzzySquirrel/Mcc-eng.git
   ```
   Or click **Code → Download ZIP** on the GitHub repository page.

2. Locate the theme folder at:
   ```
   wp-content/themes/mccusker-engineering/
   ```

### Step 2 – Create a ZIP of the Theme

Compress **only** the `mccusker-engineering` folder into a `.zip` file:
```bash
cd wp-content/themes
zip -r mccusker-engineering.zip mccusker-engineering/
```
On Windows/Mac you can right-click the folder and choose "Compress" or "Send to → Compressed folder".

### Step 3 – Upload to WordPress

1. Log in to your WordPress admin dashboard (e.g., `https://www.mccuskerengineering.co.za/wp-admin`).
2. Go to **Appearance → Themes → Add New → Upload Theme**.
3. Choose the `mccusker-engineering.zip` file and click **Install Now**.
4. After installation, click **Activate**.

### Step 4 – Install the Parent Theme

If not already installed:
1. Go to **Appearance → Themes → Add New**.
2. Search for **Twenty Twenty-Four** and click **Install** (do **not** activate it).

### Step 5 – Create Required Pages

1. Go to **Pages → Add New** and create the following pages:

   | Page Title | Slug | Template |
   |---|---|---|
   | Home | `home` | Default |
   | Services | `services` | Services Page |
   | Gallery | `gallery` | Gallery Page |
   | Contact | `contact` | Contact Page |

2. For each page, set the **Page Template** in the right sidebar under "Page Attributes" → "Template".

### Step 6 – Configure WordPress Settings

1. **Set the front page**: Go to **Settings → Reading**, select "A static page", and choose "Home" as the front page.
2. **Set up navigation**: Go to **Appearance → Menus**, create a new menu with Home, Services, Gallery, and Contact, and assign it to "Primary Navigation".
3. **Install Contact Form 7** (optional): Go to **Plugins → Add New**, search for "Contact Form 7", install and activate it.

### Step 7 – Start Adding Gallery Content

1. Go to **Projects → Categories** and create your categories (e.g., Welding, Brazing, Machining, Manufacturing, Plate Rolling).
2. Go to **Projects → Add New** to add your first project with a photo and optional video.
3. Visit the Gallery page on your site to see your projects displayed.

## Services

1. Aluminium and Stainless Steel Welding
2. Brazing
3. General Machining
4. Manufacturing
5. Plate Rolling

## Contact

- **Gordon** – 0734959727
- **Website**: www.mccuskerengineering.co.za