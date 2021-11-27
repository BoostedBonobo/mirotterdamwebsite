import {loadElements} from "./loadElements.js"

import * as canvas from "./canvas/Canvas.js"
import {setImage as setCanvasImage} from "./canvas/setImage.js";

import {AttributeEditor} from "./attribute-editor/AttributeEditor.js"
import {SizeSlider} from "./attribute-editor/ElementSizeSlider.js"

import {BottomMenu} from "./buttons/BottomMenu.js";


setCanvasImage() // Sets the canvas image

loadElements( // Loads element-library with elements, and sets click events on each element to show them on canvas
    element => canvas.addElement(element, canvas.imageWidth, canvas.selectElement))

AttributeEditor() // Initializes the attribute-editor menu
SizeSlider(canvas.imageWidth, 50) // Initializes size-slider

BottomMenu() // Initializes buttons of bottom menu