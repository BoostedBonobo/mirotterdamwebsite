const button = document.getElementById('delete-button')

export function deleteElement() {
    console.log('deleting')
}

export function toggleEnabled() {
    button.disabled = !button.disabled
}