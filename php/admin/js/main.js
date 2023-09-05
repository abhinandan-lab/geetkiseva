function replaceSpacesWithHyphens(classFrom, classTo) {
    // Use a regular expression to replace spaces globally with hyphens
    let stringval =document.querySelector(classFrom).value;
    let updatedString = stringval.replace(/ /g, '-');
    document.querySelector(classTo).value = updatedString.toLowerCase();
}


function test(){
    console.log('helllllllllllo');
}


function previewImage(event) {
    const imagePreview = document.getElementById('imagePreview');
    const imgPreviewContainer = document.getElementById('imgPreviewContainer');
    const thumbnailInput = document.getElementById('thumbnailInput');
    const selectedFile = thumbnailInput.files[0];
    
    if (selectedFile) {
        const reader = new FileReader();
        reader.onload = function(event) {
            imagePreview.src = event.target.result;
        };
        reader.readAsDataURL(selectedFile);
        imgPreviewContainer.style.display = 'block'; // Show the div
    } else {
        imagePreview.src = '';
        imgPreviewContainer.style.display = 'none'; // Hide the div
    }
}


console.log('Image Preview');