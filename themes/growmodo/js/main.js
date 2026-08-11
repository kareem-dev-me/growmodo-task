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

document.addEventListener("DOMContentLoaded", () => {
  initCollapses();
  initCarousels();
  initDropdowns();
  initPropertyGallery();
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
