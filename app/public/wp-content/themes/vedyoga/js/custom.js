import Search from './modules/searchFunction';
import menu from './modules/menuFunction';



window.onbeforeunload = function () {
  window.scrollTo(0, 0);
}


$(document).ready(function(){
  // search
  var magicalSearch = new Search();
  // menu
  // menu();




})
