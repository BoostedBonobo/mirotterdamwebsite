const files = ['g-Bloem1.png', 'g-Bloem2.png', 'g-Bloem3.png', 'g-Bloem4.png', 'g-Boom.png'];

export const ElementsMenu = {
    loadElements: loadElements
}

function loadElements(elementOnClick) {
    files.forEach(file => {
        // adds images to menu
        let image = document.createElement('img')
        image.src = 'assets/elements/' + file

        switch (file[0]) {
            case 'g':
                document.getElementById('menu-groen').appendChild(image)
                break;
        }

        // add image to canvas onclick
        image.addEventListener('click', (e) => elementOnClick(e.target))
    })
}