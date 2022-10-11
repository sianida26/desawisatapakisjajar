
const sidebarRootElement = document.getElementById("sidebar-root");
const sidebarElement = document.getElementById("sidebar");
const menuButtonElement = document.getElementById("menu-button");
const navItems = document.querySelectorAll(".nav-item");

const toggleSidebar = () => {

    if (sidebarRootElement?.classList.contains("hidden")){
        //show sidebar
        sidebarRootElement?.classList.remove("hidden");
        sidebarRootElement?.classList.add("flex");
    } else {
        sidebarRootElement?.classList.remove("flex");
        sidebarRootElement?.classList.add("hidden");
    }
}

window.onload = () => {
    menuButtonElement?.addEventListener('click', toggleSidebar)
    sidebarElement?.addEventListener('click', (e) => e.stopPropagation())
    sidebarRootElement?.addEventListener('click', toggleSidebar)

    navItems.forEach(e => e.addEventListener('click', toggleSidebar))
}