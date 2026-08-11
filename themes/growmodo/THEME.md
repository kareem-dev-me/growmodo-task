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

## Visual fidelity notes (QA pass)

Compared against Figma file `7FfQT5aC3gq4wSoY5druDj` (community 1314076616839640516).

### Fixed
- Wrong bathtub-as-star asset → section sparkles + rating stars
- Property card third badge = Villa (not area)
- Card surface `#141414`, padding/gaps closer to Figma
- Header centered nav, logo 160×48, banner 18px
- Testimonial avatars and 44px rating stars
- Shared section heading partial

### About Us fidelity
- Sections: Journey (+ stats + Figma house-model image), Values (intro + 2×2 icon cards), Achievements, 6 Steps, Team (portraits + X button + Say Hello), Valued Clients
- Assets under `assets/images/about/` (journey + team portraits from Produce UI Figma exports)

### Properties archive fidelity
- Hero + search/filters (Location, Type, Price, Size, Year) with GET `pre_get_posts` wiring
- Discover grid + Figma pagination chrome
- Let's Make it Happen inquiry form (`admin-post` + nonce + honeypot)

### Remaining / unavoidable
- Hero circular badge omits full curved-text path (structure + sizes matched)
- Sticky header (Figma is static) kept for UX
- Laptop 1440 frame approximated via fluid Tailwind breakpoints
- Exact carousel interaction vs Figma arrow chrome is simplified
- About value/client icons are stroke SVGs matched to Figma glyphs (MCP asset export was rate-limited)

## Activation checklist

1. Appearance → Themes → activate **Estatein**
2. Visit any front URL once (seeds properties + pages)
3. Settings → Permalinks → Save (flush rewrites)
4. Set a Primary menu if desired (fallback nav is included)
