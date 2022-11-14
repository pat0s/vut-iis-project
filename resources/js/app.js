require('./bootstrap');
import { JoinTournament, ButtonPressedTournament } from './modules/tournament';
import { ButtonPressedProfile } from './modules/profile';

const loggedUserDiv = document.getElementById('logged-user-div');
const userNavDiv = document.getElementById('user-nav-div');
const addNewMemberFieldset = document.getElementById('add-new-member-to-team-fieldset');


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