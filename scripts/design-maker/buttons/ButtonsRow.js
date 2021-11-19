import {showLibraryMenu} from "./Add.js";
import {deleteElement} from "./Delete.js";

import {getSelectedElement} from "../utils/getSelectedElement.js";

export function ButtonsRow() {
    document.getElementById('elements-menu-button').addEventListener('click', () => {
        showLibraryMenu()
    })

    document.getElementById('delete-button').addEventListener('click', () => {
        deleteElement()
    })
}