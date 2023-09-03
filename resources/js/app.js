import './bootstrap';

import "@fortawesome/fontawesome-free/css/all.css";

import editorjs from './editorjs'

import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';

document.addEventListener("alpine:init", () => {
    Alpine.data("mainTheme", () => {
        const loadingMask = {
            pageLoaded: false,
            init() {
                window.onload = (event) => {
                    this.pageLoaded = true;
                };
            },
        };

        const getTheme = () => {
            if (window.localStorage.getItem("dark")) {
                return JSON.parse(window.localStorage.getItem("dark"));
            }
            return (
                !!window.matchMedia &&
                window.matchMedia("(prefers-color-scheme: dark)").matches
            );
        };
        const setTheme = (value) => {
            window.localStorage.setItem("dark", value);
        };

        return {
            // init,
            loadingMask,
            isDarkMode: getTheme(),
            toggleTheme() {
                this.isDarkMode = !this.isDarkMode;
                setTheme(this.isDarkMode);
            },
        }
    });

});
 
Livewire.start()