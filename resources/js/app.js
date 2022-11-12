require('./bootstrap');
import { JoinTournament, ButtonPressedTournament } from './modules/tournament';
import { ButtonPressedProfile } from './modules/profile';


window.changePage = (URL) => {
    
    window.location.href = URL;
}

