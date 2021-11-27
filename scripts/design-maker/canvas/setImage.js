import {canvas} from "./Canvas.js";

export function setImage() {// get query string parameter
    const locationId = getLocationId() || 5 // default location id of 5 for testing
    canvas.style.backgroundImage = `url('assets/img/location_images/L-${locationId}.png')`
}

function getLocationId() {
    const urlSearchParams = new URLSearchParams(window.location.search);
    const params = Object.fromEntries(urlSearchParams.entries());
    return params.location
}