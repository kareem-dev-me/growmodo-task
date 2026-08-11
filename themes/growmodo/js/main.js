import "../css/main.css";
import { initCollapses } from "flowbite/lib/esm/components/collapse";
import { initCarousels } from "flowbite/lib/esm/components/carousel";
import { initDropdowns } from "flowbite/lib/esm/components/dropdown";

document.addEventListener("DOMContentLoaded", () => {
  initCollapses();
  initCarousels();
  initDropdowns();

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
