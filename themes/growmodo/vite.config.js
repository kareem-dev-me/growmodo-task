import { defineConfig } from "vite";
import tailwindcss from "@tailwindcss/vite";
import viteImagemin from "vite-plugin-imagemin";
import { unlinkSync, existsSync } from "node:fs";
import { resolve, dirname } from "node:path";
import { fileURLToPath } from "node:url";

const themeRoot = dirname(fileURLToPath(import.meta.url));

export default defineConfig({
  base: "./",
  plugins: [
    tailwindcss(),
    viteImagemin({
      gifsicle: { optimizationLevel: 7 },
      optipng: { optimizationLevel: 7 },
      mozjpeg: { quality: 80 },
      pngquant: { quality: [0.7, 0.85] },
      svgo: {
        plugins: [
          { name: "removeViewBox", active: false },
          { name: "removeEmptyAttrs", active: false },
        ],
      },
    }),
    {
      name: "remove-empty-critical-js",
      closeBundle() {
        const criticalJs = resolve(themeRoot, "dist/critical.js");
        if (existsSync(criticalJs)) {
          unlinkSync(criticalJs);
        }
      },
    },
  ],
  build: {
    outDir: "dist",
    emptyOutDir: true,
    manifest: false,
    rollupOptions: {
      input: {
        theme: resolve(themeRoot, "js/main.js"),
        critical: resolve(themeRoot, "js/critical.js"),
        admin: resolve(themeRoot, "js/admin.js"),
      },
      output: {
        entryFileNames: (chunk) => {
          if (chunk.name === "theme") return "theme.js";
          if (chunk.name === "critical") return "critical.js";
          if (chunk.name === "admin") return "admin.js";
          return "[name].js";
        },
        chunkFileNames: "chunks/[name].js",
        assetFileNames: (assetInfo) => {
          const name = assetInfo.name || "";
          if (name === "theme.css" || name.endsWith("main.css")) {
            return "theme.css";
          }
          if (name === "critical.css" || name.includes("critical")) {
            return "critical.css";
          }
          if (name === "admin.css" || name.includes("admin")) {
            return "admin.css";
          }
          return "assets/[name][extname]";
        },
      },
    },
  },
});
