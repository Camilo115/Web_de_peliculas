
document.getElementById("nombre").addEventListener("input", forceLower); document.getElementById("apellido").addEventListener("input", forceLower);

// Event handling functions are automatically passed a reference to the
// event that triggered them as the first argument (evt)
function forceLower(evt) {
  // Get an array of all the words (in all lower case)
  var words = evt.target.value.toLowerCase().split(/\s+/g);
  
  // Loop through the array and replace the first letter with a cap
  var newWords = words.map(function(element){   
    // As long as we're not dealing with an empty array element, return the first letter
    // of the word, converted to upper case and add the rest of the letters from this word.
    // Return the final word to a new array
    return element !== "" ?  element[0].toUpperCase() + element.substr(1, element.length) : "";
  });
  
 // Replace the original value with the updated array of capitalized words.
 evt.target.value = newWords.join(" "); 
}

function preventNumberInput(e){ var keyCode = (e.keyCode ? e.keyCode : e.which); if (keyCode > 47 && keyCode < 58 || keyCode > 95 && keyCode < 107 ){ e.preventDefault();}}

function mostrar_contra(){ var x = document.getElementById("contra"); var y = document.getElementById("c_contra"); var i = document.getElementById("btn_contra"); if (x.type === "password") {x.type = "text";y.type = "text";i.className="bi bi-eye-slash-fill";}else { x.type = "password"; y.type = "password"; i.className="bi bi-eye-fill";}}

function verif_contra(){ var contra = document.getElementById("contra").value; var c_contra = document.getElementById("c_contra").value; if (contra!==c_contra) { alert("Las contraseñas son distintas"); return false;}else{return true;}}

function regresar(){ window.history.back();}