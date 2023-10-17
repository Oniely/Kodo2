const dropdownNav = document.querySelector("#profile_nav");
const div = dropdownNav.children[1];

dropdownNav.addEventListener("click", (event) => {
    event.stopPropagation();
    if (div.style.display === "flex") {
        div.style.display = "none";
    } else {
        div.style.display = "flex";
    }
});

document.addEventListener("click", (event) => {
    if (event.target !== div && !div.contains(event.target)) {
        div.style.display = "none";
    }
});

const fullScreen = document.querySelector("#fullscreen");

fullScreen.addEventListener("click", () => {
    if (
        (document.fullScreenElement && document.fullScreenElement !== null) ||
        (!document.mozFullScreen && !document.webkitIsFullScreen)
    ) {
        if (document.documentElement.requestFullScreen) {
            document.documentElement.requestFullScreen();
        } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullScreen) {
            document.documentElement.webkitRequestFullScreen(
                Element.ALLOW_KEYBOARD_INPUT
            );
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        }
    }
});
