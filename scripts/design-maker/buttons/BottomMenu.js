import {deSelectElement} from "../Canvas.js";

import {elementsMenuButton, showLibraryMenu} from "./Add.js";
import {deleteButton, deleteElement} from "./Delete.js";
import {submitButton, submitImage} from "./Submit.js";

export function BottomMenu() {
    elementsMenuButton.addEventListener('click', () => {
        showLibraryMenu()
    })

    deleteButton.addEventListener('click', () => {
        deSelectElement()
        deleteElement()
    })

    submitButton.addEventListener('click', () => {
        submitImage()
    })
}