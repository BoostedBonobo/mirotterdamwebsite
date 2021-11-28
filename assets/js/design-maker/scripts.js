import {loadElements} from "./loadElements.js"

import * as canvas from "./Canvas.js"

import {AttributeEditor} from "./attribute-editor/AttributeEditor.js"
import {SizeSlider} from "./attribute-editor/ElementSizeSlider.js"

import {BottomMenu} from "./buttons/BottomMenu.js";


canvas.setImage() // Sets the canvas image

loadElements( // Loads element-library with elements, and sets click events on each element to show them on canvas
    element => canvas.addElement(element, canvas.imageWidth, canvas.selectElement))

AttributeEditor() // Initializes the attribute-editor menu
SizeSlider(canvas.imageWidth, 50) // Initializes size-slider

BottomMenu() // Initializes buttons of bottom menu