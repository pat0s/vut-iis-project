const submitButton = document.getElementById('submit-button');
const cancelButton = document.getElementById('cancel-button');
const editButton = document.getElementById('edit-button');
const spanInputTags = Array.from(document.getElementsByClassName('participant-name-input'));
const matchResult = Array.from(document.getElementsByClassName('match-result'));
const matchResultInput = Array.from(document.getElementsByClassName('match-result-input'));




window.buttonPressedTournament = () => {
    console.log("button pressed");

    submitButton.classList.toggle('hidden-element');
    cancelButton.classList.toggle('hidden-element');
    editButton.classList.toggle('hidden-element');

    spanInputTags.forEach((item) => {
        item.classList.toggle('hidden-element');
    });
    
    matchResult.forEach((item) => {
        item.classList.toggle('hidden-element');
    });

    matchResultInput.forEach((item) => {
        item.classList.toggle('hidden-element');
    });


    return false;
}


window.joinTournament = () =>{
    console.log("join Tournament");
    // return false;
}