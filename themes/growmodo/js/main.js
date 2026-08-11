import "../css/main.css";
import { initCollapses } from "flowbite/lib/esm/components/collapse";
import { initCarousels } from "flowbite/lib/esm/components/carousel";
import { initDropdowns } from "flowbite/lib/esm/components/dropdown";

function initOfficeTabs() {
  const root = document.getElementById("office-locations");
  if (!root) return;

  const tabs = root.querySelectorAll("[data-office-tab]");
  const cards = root.querySelectorAll(".office-card");
  if (!tabs.length || !cards.length) return;

  const setActive = (category) => {
    tabs.forEach((tab) => {
      const active = tab.dataset.officeTab === category;
      tab.setAttribute("aria-selected", active ? "true" : "false");
      tab.classList.toggle("border-grey-15", active);
      tab.classList.toggle("bg-grey-08", active);
      tab.classList.toggle("text-absolute-white", active);
      tab.classList.toggle("border-transparent", !active);
      tab.classList.toggle("bg-transparent", !active);
      tab.classList.toggle("text-grey-60", !active);
    });

    cards.forEach((card) => {
      const match = category === "all" || card.dataset.officeCategory === category;
      card.hidden = !match;
    });
  };

  tabs.forEach((tab) => {
    tab.addEventListener("click", () => {
      setActive(tab.dataset.officeTab || "all");
    });
  });
}

function initPropertyGallery() {
  const root = document.getElementById("property-gallery");
  if (!root) return;

  const dataEl = document.getElementById("property-gallery-data");
  let urls = [];
  try {
    urls = JSON.parse(dataEl?.textContent || "[]");
  } catch {
    urls = [];
  }
  if (!urls.length) return;

  let index = 0;
  const mainA = document.getElementById("property-gallery-main-a");
  const mainB = document.getElementById("property-gallery-main-b");
  const thumbs = root.querySelectorAll(".property-gallery-thumb");
  const prev = document.getElementById("property-gallery-prev");
  const next = document.getElementById("property-gallery-next");

  const setActive = (i) => {
    index = ((i % urls.length) + urls.length) % urls.length;
    if (mainA) mainA.src = urls[index];
    if (mainB) mainB.src = urls[(index + 1) % urls.length];
    thumbs.forEach((thumb) => {
      const active = Number(thumb.dataset.galleryIndex) === index;
      thumb.classList.toggle("border-purple-60", active);
      thumb.classList.toggle("border-transparent", !active);
    });
  };

  thumbs.forEach((thumb) => {
    thumb.addEventListener("click", () => {
      setActive(Number(thumb.dataset.galleryIndex) || 0);
    });
  });
  prev?.addEventListener("click", () => setActive(index - 1));
  next?.addEventListener("click", () => setActive(index + 1));
}

function initFeaturedCarousel() {
  const root = document.querySelector("[data-featured-carousel]");
  if (!root) return;

  const track = root.querySelector("[data-featured-track]");
  const slides = [...root.querySelectorAll("[data-featured-slide]")];
  const prev = root.querySelector("[data-featured-prev]");
  const next = root.querySelector("[data-featured-next]");
  const currentEl = root.querySelector("[data-featured-current]");
  const totalEl = root.querySelector("[data-featured-total]");
  if (!track || !slides.length) return;

  let index = 0;

  const perView = () => {
    if (window.matchMedia("(min-width: 1280px)").matches) return Math.min(3, slides.length);
    if (window.matchMedia("(min-width: 768px)").matches) return Math.min(2, slides.length);
    return 1;
  };

  const maxIndex = () => Math.max(0, slides.length - perView());

  const pad2 = (n) => String(n).padStart(2, "0");

  const render = () => {
    const max = maxIndex();
    index = ((index % (max + 1)) + (max + 1)) % (max + 1);

    const slideWidth = slides[0].getBoundingClientRect().width;
    const gap = Number.parseFloat(getComputedStyle(track).columnGap || getComputedStyle(track).gap) || 0;
    track.style.transform = `translate3d(-${index * (slideWidth + gap)}px, 0, 0)`;

    if (currentEl) currentEl.textContent = pad2(index + 1);
    if (totalEl) totalEl.textContent = pad2(max + 1);

    prev?.classList.toggle("opacity-40", max === 0);
    next?.classList.toggle("opacity-40", max === 0);
    prev?.toggleAttribute("disabled", max === 0);
    next?.toggleAttribute("disabled", max === 0);
  };

  prev?.addEventListener("click", () => {
    index -= 1;
    render();
  });
  next?.addEventListener("click", () => {
    index += 1;
    render();
  });

  window.addEventListener("resize", () => {
    render();
  });

  // Recalculate after images/fonts settle.
  window.addEventListener("load", render);
  render();
}

document.addEventListener("DOMContentLoaded", () => {
  initCollapses();
  initCarousels();
  initDropdowns();
  initPropertyGallery();
  initFeaturedCarousel();
  initOfficeTabs();

  const banner = document.getElementById("promo-banner");
  const closeBtn = document.getElementById("promo-banner-close");
  if (banner && closeBtn) {
    if (sessionStorage.getItem("estatein-banner-dismissed") === "1") {
      banner.hidden = true;
    }
    closeBtn.addEventListener("click", () => {
      banner.hidden = true;
      sessionStorage.setItem("estatein-banner-dismissed", "1");
    });
  }
});
