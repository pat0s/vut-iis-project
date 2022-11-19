require('./bootstrap');
require('./modules/user');
require('./modules/sport');
require('./modules/team');
require('./modules/tournament');


const userNavDiv = document.getElementById('user-nav-div');


window.changePage = (URL) => {

    window.location.href = URL;
}


window.clickOnUserNavDiv = () =>{

    userNavDiv.classList.toggle('hidden-element');
}


