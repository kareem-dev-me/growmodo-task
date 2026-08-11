import "../css/main.css";
import { initCollapses } from "flowbite/lib/esm/components/collapse";
import { initCarousels } from "flowbite/lib/esm/components/carousel";
import { initDropdowns } from "flowbite/lib/esm/components/dropdown";

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
