const canvas = document.getElementById('canvas')

// element menu
let isElementMenuShown = false
const elementMenuAnimation = gsap.timeline()
elementMenuAnimation.to('.elements-menu-container', {duration: 0.2, left: 0})
elementMenuAnimation.pause()

document.getElementById('elements-menu-button').addEventListener('click', e => {
    if (!isElementMenuShown) {
        elementMenuAnimation.play()
        isElementMenuShown = !isElementMenuShown
    }
})

canvas.addEventListener('click', e => {
    if (isElementMenuShown) {
        elementMenuAnimation.reverse()
        isElementMenuShown = !isElementMenuShown
    }
})