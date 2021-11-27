import {toggleEnabled as toggleDeleteButton} from "../buttons/Delete.js";
import {hideElementEditor, showElementEditor} from "../attribute-editor/AttributeEditor.js";

export const canvas = document.getElementById('canvas')
export const imageWidth = 100

// add element to canvas
export function addElement(element, width, onSelect) {
    const img = element.cloneNode(true)
    img.id = 'obj' + Math.floor(Math.random() * 99) // assign random id to object
    img.width = width;
    canvas.appendChild(img)

    Draggable.create(`#canvas > img#${img.id}`, {
        type: 'x,y',
        bounds: '#canvas',
        onClick: onSelect
    })
}

// events
let selectedElement;

export const selectElement = e => { // event for selecting element
    if (selectedElement) return
    e.preventDefault()

    selectedElement = e.target

    selectedElement.classList.add('selected')
    toggleDeleteButton(selectedElement)
    showElementEditor(selectedElement)
}

export const deSelectElement = () => { // event for unselecting element
    if (!selectedElement) return

    selectedElement.classList.remove('selected')
    toggleDeleteButton()
    hideElementEditor()
    selectedElement = undefined
}

canvas.addEventListener('click', deSelectElement)