# Estatein WordPress Theme

Custom classic PHP theme implementing the [Estatein dark real-estate Figma UI](https://www.figma.com/design/7FfQT5aC3gq4wSoY5druDj/Real-Estate-Business-Website-UI-Template---Dark-Theme-%7C-Produce-UI--Community-?node-id=45-2).

## Overview

- Theme path: `wp-content/themes/growmodo`
- Stack: Vite 8, Tailwind CSS v4 (`@tailwindcss/vite`), selective Flowbite ESM inits
- Brand: Urbanist + Figma greys (`#141414` / `#1A1A1A` / `#262626`) + purple `#703BF7`

## Development

```bash
cd wp-content/themes/growmodo
npm install
npm run dev    # vite build --watch
npm run build  # production dist/
```

Front-end loads `dist/theme.css` + `dist/theme.js` with `filemtime` cache busting. Critical CSS is inlined from `dist/critical.css`.

## Architecture

- `header.php` / `footer.php` + `template-parts/` for reusable UI
- `front-page.php` composes home sections
- Page templates: `page-templates/about.php`, `services.php`, `contact.php`
- CPT templates: `archive-property.php`, `single-property.php`
- `inc/` — setup, assets, CPT, forms, pages seed, nav walker

## WordPress implementation

| Content | Approach |
|--------|----------|
| Properties | CPT `property` + meta (`_price`, `_bedrooms`, `_bathrooms`, `_area`, `_location`) |
| FAQ / testimonials | Static arrays in template parts |
| About / Services / Contact | Pages auto-created with templates on theme init |
| Newsletter / Contact | `admin-post.php` + nonce + honeypot + `wp_mail` |

No page builders. No ACF (core meta boxes only).

## Responsive

- Desktop content width ~1596px with 162px side padding from `xl`
- Tablet: 2-column cards, stacked hero
- Mobile (390): collapse nav, single-column grids, full-width CTAs

## Accessibility / SEO / Performance

- Semantic landmarks, skip link, visible `:focus-visible`
- Heading hierarchy per section; descriptive image alts on LCP/hero
- Lazy-load below-fold images; `fetchpriority` on hero LCP
- Block library CSS dequeued on front; assets deferred

## 4-hour scope limitations

- Property Details omits deeper Figma modules (floor plans, rich galleries)
- Circular hero badge is simplified vs. curved Figma text path
- Testimonials avatars reuse property imagery
- Laptop-specific Figma frames approximated via fluid Tailwind breakpoints
- Social links are placeholders (`#`)

## Activation checklist

1. Appearance → Themes → activate **Estatein**
2. Visit any front URL once (seeds properties + pages)
3. Settings → Permalinks → Save (flush rewrites)
4. Set a Primary menu if desired (fallback nav is included)
