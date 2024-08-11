const userTheme = localStorage.getItem("theme");
const moonIcon = document.querySelector(".moon-icon");
const sunIcon = document.querySelector(".sun-icon");
const themeToggle = document.querySelector(".theme-toggle");

document.addEventListener("DOMContentLoaded", function () {
    if (userTheme === "dark") {
        document.documentElement.classList.add("dark");
        moonIcon.classList.add("hidden");
        sunIcon.classList.remove("hidden");
    } else {
        document.documentElement.classList.remove("dark");
        moonIcon.classList.remove("hidden");
        sunIcon.classList.add("hidden");
    }
});

themeToggle.addEventListener("click", function () {
    const userTheme = localStorage.getItem("theme");
    if (userTheme === "dark") {
        document.documentElement.classList.remove("dark");
        localStorage.setItem("theme", "light");
        sunIcon.classList.add("hidden");
        moonIcon.classList.remove("hidden");
    } else {
        document.documentElement.classList.add("dark");
        localStorage.setItem("theme", "dark");
        sunIcon.classList.remove("hidden");
        moonIcon.classList.add("hidden");
    }
});
