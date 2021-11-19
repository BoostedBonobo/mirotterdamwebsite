import {setCanvasImage} from "./setCanvasImage.js"
import {loadElements} from "./loadElements.js"

import {createCanvasElement} from "./CanvasElement.js"
import {AttributeEditor, hideElementEditor, showElementEditor} from "./attribute-editor/AttributeEditor.js"
import {SizeSlider} from "./attribute-editor/ElementSizeSlider.js"

import {ButtonsRow} from "./buttons/ButtonsRow.js";
import {toggleEnabled as toggleDeleteButton} from "./buttons/Trash.js";

const canvas = document.getElementById('canvas')
const canvasImageWidth = 100

setCanvasImage(canvas) // Sets the canvas image

AttributeEditor() // Initializes the attribute-editor header menu
SizeSlider(canvasImageWidth, 50) // Initializes SizeSlider

ButtonsRow() // Initializes all the buttons in the bottom row

loadElements( // Loads element-library with elements, and sets click events on each element to show them on canvas
    element => createCanvasElement(canvas, element, canvasImageWidth, canvasElementOnSelect))

let selectedElement;

const canvasElementOnSelect = e => { // event for selecting element
    if (selectedElement) return
    e.preventDefault()

    selectedElement = e.target

    selectedElement.classList.add('selected')
    toggleDeleteButton()
    showElementEditor(selectedElement)
}

const canvasElementOnDeselect = () => { // event for unselecting element
    if (!selectedElement) return

    selectedElement.classList.remove('selected')
    toggleDeleteButton()
    hideElementEditor()
    selectedElement = undefined
}

canvas.addEventListener('click', canvasElementOnDeselect)
