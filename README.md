# Growmodo Task — Estatein WordPress Theme

Pixel-faithful WordPress implementation of the [Estatein dark real-estate UI](https://www.figma.com/design/7FfQT5aC3gq4wSoY5druDj/Real-Estate-Business-Website-UI-Template---Dark-Theme-%7C-Produce-UI--Community-?node-id=45-2) (Produce UI / Figma).

This repository tracks `wp-content` for a Local WP site. The custom theme lives at:

```text
themes/growmodo
```

## Stack

| Layer | Choice |
|--------|--------|
| CMS | WordPress 6.x (classic PHP theme) |
| Build | Vite 8 |
| CSS | Tailwind CSS v4 (`@tailwindcss/vite`) |
| UI JS | Selective Flowbite ESM |
| Font | Urbanist |
| Brand | Greys `#141414` / `#1A1A1A` / `#262626` · Purple `#703BF7` |

No page builders. No ACF — core meta boxes only.

## Pages & templates

| Route | Template |
|--------|----------|
| Home | `front-page.php` |
| About Us | `page-templates/about.php` |
| Services | `page-templates/services.php` |
| Contact Us | `page-templates/contact.php` |
| Properties archive | `archive-property.php` |
| Property details | `single-property.php` |

Reusable UI lives in `themes/growmodo/template-parts/`. Theme logic is under `themes/growmodo/inc/` (setup, assets, CPT, forms, page seeding, nav walker).

## Features

- **Property CPT** with meta: price, bedrooms, bathrooms, area, location, type, features
- **Archive filters** (location, type, price, size, year) via GET + `pre_get_posts`
- **Forms** (contact, inquiry, newsletter) through `admin-post.php` with nonce + honeypot + `wp_mail`
- **Auto-seeded** About / Services / Contact pages and demo properties on first visit
- Responsive layout matching Figma Desktop / Laptop / Mobile frames

## Quick start

### 1. WordPress

1. Copy or clone this `wp-content` into a WordPress install (Local WP, Docker, etc.).
2. **Appearance → Themes → activate Estatein**.
3. Visit any front URL once (seeds pages + sample properties).
4. **Settings → Permalinks → Save** (flush rewrites).
5. Optionally set a Primary menu (a fallback nav is included).

### 2. Front-end build

```bash
cd themes/growmodo
npm install
npm run build   # production → dist/
npm run dev     # vite build --watch
```

The theme enqueues `dist/theme.css` and `dist/theme.js` with `filemtime` cache busting. Critical CSS is inlined from `dist/critical.css`.

### Requirements

- PHP 8.0+
- Node.js 20+ (for theme builds)
- WordPress 6.0+

## Repository layout

```text
wp-content/
├── README.md                 ← you are here
├── themes/growmodo/          ← Estatein theme
│   ├── THEME.md              ← detailed fidelity / QA notes
│   ├── assets/               ← images & icons
│   ├── css/ · js/            ← Vite sources
│   ├── dist/                 ← built CSS/JS (committed for deploy)
│   ├── inc/                  ← PHP modules
│   ├── page-templates/
│   ├── template-parts/
│   ├── package.json
│   └── vite.config.js
├── plugins/
└── uploads/                  ← media (not required in git for review)
```

## Design source

- **Figma:** [Estatein — Produce UI](https://www.figma.com/design/7FfQT5aC3gq4wSoY5druDj/)
- **Reference site:** [estatein-real-estate-website.webflow.io](https://estatein-real-estate-website.webflow.io/)

For section-by-section fidelity notes and known intentional differences, see [`themes/growmodo/THEME.md`](themes/growmodo/THEME.md).

## License

Theme code is GPL-2.0-or-later (WordPress theme convention). Design assets follow the Produce UI / Figma community file terms.
