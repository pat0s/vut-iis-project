const editButton = document.getElementById('edit-button');
const submitButton = document.getElementById('submit-button');
const cancelButton = document.getElementById('cancel-button');
const formPTags = Array.from(document.getElementsByClassName('form-p-tag'));
const formInputTags = Array.from(document.getElementsByClassName('form-input-tag'));


window.buttonPressedProfile = () =>{
    console.log("button pressed");
    
    editButton.classList.toggle('hidden-element');
    submitButton.classList.toggle('hidden-element');
    cancelButton.classList.toggle('hidden-element');

    formPTags.forEach((item) => {
        item.classList.toggle('hidden-element');
    });

    formInputTags.forEach((item) => {
        item.classList.toggle('hidden-element');
    });

}


