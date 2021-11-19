import {getSelectedElement} from "../utils/getSelectedElement.js";

const slider = document.getElementById('scale-slider')
let selectedElement;

export function Slider(imageWidth, imageMargin) {
    slider.min = imageWidth - imageMargin
    slider.max = imageWidth + imageMargin

    slider.addEventListener('input', e => {
        selectedElement.style.width = parseInt(slider.value) + 'px'
    })
}

export function updateSlider(element) {
    slider.value = element.width
    selectedElement = element
}