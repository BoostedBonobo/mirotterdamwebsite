const elementMenuAnimation = gsap.timeline() // animation
elementMenuAnimation.to('.elements-menu-container', {duration: 0.2, left: 0})
elementMenuAnimation.pause()

const canvas = document.getElementById('canvas')

let menuIsShown = false

canvas.addEventListener('click', () => {
    if (!menuIsShown) return // disable event listener if menu is not shown

    elementMenuAnimation.reverse()
    menuIsShown = !menuIsShown
})

export function showLibraryMenu() {
    elementMenuAnimation.play()
    menuIsShown = !menuIsShown
}
