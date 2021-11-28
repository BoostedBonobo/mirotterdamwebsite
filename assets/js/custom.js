window.onload = function() {
    let url = window.location.href;
    if (screen.width < 730 && url.includes('ontwerpen')){
        let urlParams = new URLSearchParams(window.location.search); 
        console.log(urlParams.get('locatie'))
        document.getElementById('plaatsnaam').innerHTML = "Locatie: "+ urlParams.get('locatie');
        console.log("verified")
    }
    else{
        window.location.replace("https://mirotterdam.websitejan.nl/index.html");
    }
}

//verhaallijn
function showAbout() {
    document.getElementById('about').style.display = "block";
    document.getElementById('herobox').style.display = "none";
 }
 
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

async function kijkenBtn() {
    await sleep(160);
    document.getElementById('kijkendiv').style.display = "none";
    document.getElementById('luisterdiv').style.display = "block";
}
async function luisterBtn() {
    await sleep(160);
    document.getElementById('luisterdiv').style.display = "none";
    document.getElementById('inspireerdiv').style.display = "block";
}
async function showDesign() {
    await sleep(160);
    document.getElementById('design').style.display = "block";
    document.getElementById('about').style.display = "none";
 }


 //mail verzenden
 function saveConcept() {
    if (confirm('Weet je zeker dat je het ontwerp wilt opslaan?')) {
        html2canvas(document.getElementById('canvas'),{scrollX: 0,
            scrollY: -window.scrollY}).then(function(canvas) {
                saveAs(canvas.toDataURL(), 'ontwerp.png');
            });
    
        function saveAs(uri, filename) {
            var link = document.createElement('a');

            if (typeof link.download === 'string') {
                link.href = uri;
                link.download = filename;
                
                document.body.appendChild(link);
                document.getElementById('storedScreenshot').style.backgroundImage="url("+ link+")";
                document.getElementById('ontwerpid').value=link;
        
                // link.click();
        
                // remove the link when done
                // document.body.removeChild(link);
            } else {
                window.open(uri);
            }
        }
    document.getElementById('contact').style.display = "block";
    document.getElementById('design').style.display = "none";
    }
    else{
    }
}


window.onsubmit = function() { 
    alert('Versturen bericht..'); 
    document.getElementById('contact').style.display = "none";
    document.getElementById('endscreen').style.display = "block";
    return true; };



