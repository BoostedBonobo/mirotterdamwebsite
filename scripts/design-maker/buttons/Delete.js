const button = document.getElementById('delete-button')

let selectedElement;

export function deleteElement() {
    selectedElement.remove()
}

export function toggleEnabled(element) {
    if (element) selectedElement = element

    button.disabled = !button.disabled
}