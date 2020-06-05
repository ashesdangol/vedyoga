import Search from './modules/searchFunction';
import Mymenu from './modules/menuFunction';
import headerMenu__style from './modules/scrollFunction.js';


window.onbeforeunload = function () {
  window.scrollTo(0, 0);
}


$(document).ready(function(){
  // search
  const magicalSearch = new Search();
  // menu
  const headerMenu = new Mymenu();
  //
  headerMenu__style();




})
