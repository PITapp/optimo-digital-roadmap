import { defineConfig } from "astro/config";
import tailwind from "@astrojs/tailwind";

export default defineConfig({
  site: "https://optimo.example.at",
  integrations: [
    tailwind({
      applyBaseStyles: false,
    }),
  ],
  build: {
    format: "directory",
  },
});
