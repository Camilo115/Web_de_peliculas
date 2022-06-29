// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

//Solo texto
function preventNumberInput(e){
    var keyCode = (e.keyCode ? e.keyCode : e.which);
    if (keyCode > 47 && keyCode < 58 || keyCode > 95 && keyCode < 107 ){
        e.preventDefault();
    }
}

//Solo números
function onlyNumberKey(evt) {
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }

document.getElementById("n_direct").addEventListener("input", forceLower);

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