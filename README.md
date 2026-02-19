# McCusker General Engineering – WordPress Child Theme

A professional WordPress child theme for **McCusker General Engineering**, built on the **Twenty Twenty-Four** parent theme. Designed for deployment at [www.mccuskerengineering.co.za](https://www.mccuskerengineering.co.za).

## Project Overview

This repository contains a complete WordPress child theme reflecting McCusker General Engineering's industrial branding: bold navy blue, clean typography, and a strong focus on their core engineering services.

## Repository Structure

```
/
├── README.md
├── .gitignore
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