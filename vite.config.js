import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
    // server: {
    //     host: "0.0.0.0", // Membuka akses ke jaringan lokal
    //     port: 3000, // Port yang ingin digunakan
    //     hmr: {
    //         host: "192.168.120.92", // Ganti dengan IP address laptop
    //     },
    // },
});
