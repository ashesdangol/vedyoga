import Search from './modules/searchFunction';
import Mymenu from './modules/menuFunction';
import headerMenu__style from './modules/scrollFunction.js';
import Notes from './modules/notes';


$(document).ready(function(){
  // search
  const magicalSearch = new Search();
  // menu
  const headerMenu = new Mymenu();
  //change the style of the header while scroll
  headerMenu__style();

  const notes = new Notes();


})
