import React from 'react';
import Text from './text';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faLayerGroup } from '@fortawesome/free-solid-svg-icons';
import '../style/header.css';
function Header(){
     return(
        <header className='header'>
            <div className='container'>
                <div><FontAwesomeIcon icon={faLayerGroup} size="2xl" style={{color: "#d7dae0", width:'50px', height:'50px',marginleft:'100px'}} /></div>
                <ul className='container-content'>
                    <li><a href="www.facebook.com">A propos de moi</a></li>
                    <li><a href="www.facebook.com">Formation académique</a></li>
                    <li><a href="www.facebook.com">Expériences associative</a></li>
                    <li><a href="www.bing.com">Projets académique</a></li>
                    <li><a href="www.facebook.com">Compétences</a></li>
                    <li><a href="www.facebook.com">Contact</a></li>
                </ul>
            </div>
            <Text/>
        </header>
     );
}
export default Header;