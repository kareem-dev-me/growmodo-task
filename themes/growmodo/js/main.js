import "../css/main.css";
import { initCollapses } from "flowbite/lib/esm/components/collapse";
import { initCarousels } from "flowbite/lib/esm/components/carousel";
import { initDropdowns } from "flowbite/lib/esm/components/dropdown";

document.addEventListener("DOMContentLoaded", () => {
  initCollapses();
  initCarousels();
  initDropdowns();
});
