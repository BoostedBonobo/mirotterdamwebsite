
function screenshot() {
  let CaptureDiv = document.getElementById('canvas'); 
  html2canvas(CaptureDiv).then( 
    function (canvas) { 
      document 
        .getElementById('storedScreenshot') 
        .appendChild(canvas); 
    }) 
} 