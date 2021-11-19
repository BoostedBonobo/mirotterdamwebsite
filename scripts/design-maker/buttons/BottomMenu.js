import {elementDeSelect} from "../Canvas.js";

import {elementsMenuButton, showLibraryMenu} from "./Add.js";
import {deleteButton, deleteElement} from "./Delete.js";

export function BottomMenu() {
    elementsMenuButton.addEventListener('click', () => {
        showLibraryMenu()
    })

    deleteButton.addEventListener('click', () => {
        elementDeSelect()
        deleteElement()
    })
}