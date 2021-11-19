import {canvas} from "../Canvas.js";

export const elementsMenuButton = document.getElementById('elements-menu-button')

const animation = gsap.timeline() // animation
animation.to('.elements-menu-container', {duration: 0.2, left: 0})
animation.pause()

let menuIsShown = false

export function showElementsMenu() {
    animation.play()
    menuIsShown = !menuIsShown
}

canvas.addEventListener('click', () => {
    if (!menuIsShown) return // disable event listener if menu is not shown

    animation.reverse()
    menuIsShown = !menuIsShown
})
