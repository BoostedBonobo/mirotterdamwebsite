export function loadElements(elementOnClick) {
    const files = elements_array;


    files.forEach(file => {
        // adds images to menu
        let image = document.createElement('img')
        image.src = 'assets/elements/' + file
        document.getElementById('elements-menu').appendChild(image)

        // add image to canvas onclick
        image.addEventListener('click', (e) => elementOnClick(e.target))
    })
}

