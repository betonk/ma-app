import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/sass/app.scss",
                "resources/js/app.js",
                "resources/css/app.css",
                "public/assets/plugins/fontawesome/js/all.min.js",
                "public/assets/css/portal.css",
                "public/assets/plugins/popper.min.js",
                "public/assets/plugins/bootstrap/js/bootstrap.min.js",
                "public/assets/plugins/chart.js/chart.min.js",
                "public/assets/js/index-charts.js",
                "public/assets/js/app.js",
            ],
            refresh: true,
        }),
    ],
});
