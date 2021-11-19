import {setCanvasImage} from "./setCanvasImage.js"
import {loadElements} from "./loadElements.js"

import {createCanvasElement} from "./CanvasElement.js"
import {AttributeEditor, hideElementEditor, showElementEditor} from "./attribute-editor/AttributeEditor.js"
import {SizeSlider} from "./attribute-editor/ElementSizeSlider.js"

import {deleteElement, toggleEnabled as toggleDeleteButton} from "./buttons/Delete.js";
import {showLibraryMenu} from "./buttons/Add.js";

const canvas = document.getElementById('canvas')
const canvasImageWidth = 100

setCanvasImage(canvas) // Sets the canvas image

AttributeEditor() // Initializes the attribute-editor header menu
SizeSlider(canvasImageWidth, 50) // Initializes SizeSlider

loadElements( // Loads element-library with elements, and sets click events on each element to show them on canvas
    element => createCanvasElement(canvas, element, canvasImageWidth, canvasElementSelect))

let selectedElement;

const canvasElementSelect = e => { // event for selecting element
    if (selectedElement) return
    e.preventDefault()

    selectedElement = e.target

    selectedElement.classList.add('selected')
    toggleDeleteButton(selectedElement)
    showElementEditor(selectedElement)
}

const canvasElementDeSelect = () => { // event for unselecting element
    if (!selectedElement) return

    selectedElement.classList.remove('selected')
    toggleDeleteButton()
    hideElementEditor()
    selectedElement = undefined
}

canvas.addEventListener('click', canvasElementDeSelect)

// Bottom Buttons
document.getElementById('elements-menu-button').addEventListener('click', () => {
    showLibraryMenu()
})

document.getElementById('delete-button').addEventListener('click', () => {
    canvasElementDeSelect()
    deleteElement()
})
