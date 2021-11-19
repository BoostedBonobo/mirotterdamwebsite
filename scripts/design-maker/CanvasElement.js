import {hideElementEditor, showElementEditor} from "./attribute-editor/AttributeEditor.js";

let selectedElement

const selectElement = e => {
    if (selectedElement) return // if an element has already been selected, do nothing
    e.preventDefault()

    selectedElement = e.target
    selectedElement.classList.add('selected')
    showElementEditor(selectedElement)
}

const unselectElement = e => {
    if (!selectedElement) return // if an element has not been selected, do nothing

    hideElementEditor()
    selectedElement.classList.remove('selected')
    selectedElement = undefined
}

export function CanvasElement(canvas, element, width) {
    const img = element.cloneNode(true)
    img.id = 'obj' + Math.floor(Math.random() * 99) // assign random id to object
    img.width = width;
    canvas.appendChild(img)

    Draggable.create(`#canvas > img#${img.id}`, {
        type: 'x,y',
        bounds: '#canvas',
        onClick: selectElement
    })
}

// unselect object when pressing anywhere on canvas
document.getElementById('canvas').addEventListener('click', unselectElement)