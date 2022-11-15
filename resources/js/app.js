require('./bootstrap');
import { JoinTournament, ButtonPressedTournament } from './modules/tournament';
import { ButtonPressedProfile } from './modules/profile';

const loggedUserDiv = document.getElementById('logged-user-div');
const userNavDiv = document.getElementById('user-nav-div');
const addNewMemberFieldset = document.getElementById('add-new-member-to-team-fieldset');
const switchRoundButton = document.getElementById('switch-round-button');
const labelForSwitch = document.getElementById('label-for-switch');
const switchButton = document.getElementById('tournament-for-teams');


window.changePage = (URL) => {

    window.location.href = URL;
}


window.clickOnUserNavDiv = () =>{

    userNavDiv.classList.toggle('hidden-element');
}


window.addMemberToTeambuttonHandler = (useFlag) => {

    addNewMemberFieldset.classList.toggle('hidden-element');
    console.log(useFlag);
}

let isChecked = false;
window.switchButtonHandler = () => {
    
    isChecked = !isChecked;
    
    if (isChecked) {
        console.log("Checkbox is checked..");
        labelForSwitch.innerText = "Teams";
        
    } else {
        console.log("Checkbox is not checked..");
        labelForSwitch.innerText = "Individual participants";
    }
    switchRoundButton.classList.toggle('triggered');
}