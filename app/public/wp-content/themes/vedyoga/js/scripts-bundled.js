/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./wp-content/themes/vedyoga/js/custom.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./wp-content/themes/vedyoga/js/custom.js":
/*!************************************************!*\
  !*** ./wp-content/themes/vedyoga/js/custom.js ***!
  \************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _modules_searchFunction__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./modules/searchFunction */ \"./wp-content/themes/vedyoga/js/modules/searchFunction.js\");\n/* harmony import */ var _modules_menuFunction__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./modules/menuFunction */ \"./wp-content/themes/vedyoga/js/modules/menuFunction.js\");\n/* harmony import */ var _modules_scrollFunction_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./modules/scrollFunction.js */ \"./wp-content/themes/vedyoga/js/modules/scrollFunction.js\");\n\n\n\n$(document).ready(function () {\n  // search\n  var magicalSearch = new _modules_searchFunction__WEBPACK_IMPORTED_MODULE_0__[\"default\"](); // menu\n\n  var headerMenu = new _modules_menuFunction__WEBPACK_IMPORTED_MODULE_1__[\"default\"](); //change the style of the header while scroll\n\n  Object(_modules_scrollFunction_js__WEBPACK_IMPORTED_MODULE_2__[\"default\"])();\n});\n\n//# sourceURL=webpack:///./wp-content/themes/vedyoga/js/custom.js?");

/***/ }),

/***/ "./wp-content/themes/vedyoga/js/modules/menuFunction.js":
/*!**************************************************************!*\
  !*** ./wp-content/themes/vedyoga/js/modules/menuFunction.js ***!
  \**************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nfunction _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }\n\nfunction _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }\n\nvar Mymenu = /*#__PURE__*/function () {\n  // 1  DESCRIBE FEATURE OF AN OBJECT\n  function Mymenu() {\n    _classCallCheck(this, Mymenu);\n\n    this.openButton = $('.mobile-nav-btn');\n    this.headerMenu = $('.header-menu__lists');\n    this.main__header = $('#main__header');\n    this.events();\n  } // 2 EVENTS , INSTRUCTIONS\n\n\n  _createClass(Mymenu, [{\n    key: \"events\",\n    value: function events() {\n      this.openButton.on('click', this.openMenu.bind(this));\n    } // 3 ACTIONS DO IT methods functions\n\n  }, {\n    key: \"openMenu\",\n    value: function openMenu() {\n      this.openButton.toggleClass('x');\n      this.headerMenu.toggleClass('nav-close');\n      this.main__header.toggleClass('fullHeight');\n      $('html,body').toggleClass('body-no-scroll__mobile');\n    }\n  }]);\n\n  return Mymenu;\n}(); // export default menu;\n\n\n/* harmony default export */ __webpack_exports__[\"default\"] = (Mymenu);\n\n//# sourceURL=webpack:///./wp-content/themes/vedyoga/js/modules/menuFunction.js?");

/***/ }),

/***/ "./wp-content/themes/vedyoga/js/modules/scrollFunction.js":
/*!****************************************************************!*\
  !*** ./wp-content/themes/vedyoga/js/modules/scrollFunction.js ***!
  \****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\nfunction headerMenu__style() {\n  window.onbeforeunload = function () {\n    window.scrollTo(0, 0);\n  };\n\n  window.onscroll = function () {\n    scrollFunction();\n  };\n\n  function scrollFunction() {\n    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {\n      $('#main__header').addClass('main__header--style');\n    } else {\n      $('#main__header').removeClass('main__header--style');\n    }\n  }\n}\n\n/* harmony default export */ __webpack_exports__[\"default\"] = (headerMenu__style);\n\n//# sourceURL=webpack:///./wp-content/themes/vedyoga/js/modules/scrollFunction.js?");

/***/ }),

/***/ "./wp-content/themes/vedyoga/js/modules/searchFunction.js":
/*!****************************************************************!*\
  !*** ./wp-content/themes/vedyoga/js/modules/searchFunction.js ***!
  \****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nfunction _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }\n\nfunction _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }\n\n// Search function\nvar Search = /*#__PURE__*/function () {\n  // 1. descrine create and create/initiate our object// features of an object\n  function Search() {\n    _classCallCheck(this, Search);\n\n    this.addSearchHTML();\n    this.resultsDiv = $('#search-overlay__results');\n    this.openButton = $('.js-search-trigger');\n    this.closeButton = $('.search-overlay__close');\n    this.searchOverlay = $('.search-overlay');\n    this.searchField = $('#searchbox__input');\n    this.events();\n    this.isOverlayOpen = false;\n    this.isSpinnerVisible = false;\n    this.previousValue;\n    this.typingTimer;\n  } // 2 Events\n\n\n  _createClass(Search, [{\n    key: \"events\",\n    value: function events() {\n      this.openButton.on('click', this.openOverlay.bind(this));\n      this.closeButton.on('click', this.closeOverlay.bind(this)); // $(document).on(\"keyup\", this.keyPressDispatcher.bind(this));\n\n      $(document).on(\"keydown\", this.keyPressDispatcher.bind(this));\n      this.searchField.on(\"keyup\", this.typingLogic.bind(this));\n    } // 3 Methods (functions , actions etc)\n\n  }, {\n    key: \"typingLogic\",\n    value: function typingLogic() {\n      if (this.searchField.val() != this.previousValue) {\n        clearTimeout(this.typingTimer);\n\n        if (this.searchField.val()) {\n          if (!this.isSpinnerVisible) {\n            this.resultsDiv.addClass('add-min-height');\n            this.resultsDiv.html('<div class=\"spinner-loader\"></div>');\n            this.isSpinnerVisible = true;\n          }\n\n          this.typingTimer = setTimeout(this.getResults.bind(this), 750);\n        } else {\n          this.resultsDiv.html(\"\");\n          this.isSpinnerVisible = false;\n          this.resultsDiv.removeClass('add-min-height');\n        }\n      }\n\n      this.previousValue = this.searchField.val();\n    }\n  }, {\n    key: \"getResults\",\n    value: function getResults() {\n      var _this = this;\n\n      $.getJSON(yogaData.root_url + '/wp-json/wp/v2/posts?search=' + this.searchField.val(), function (results) {\n        // console.log(results[0].title.rendered);\\\n        // var testArray = ['ashes', 'Sima', \"sujina\"];\n        _this.resultsDiv.html(\"\\n          <h2 class=\\\"header__title--one\\\">Search Results</h2>\\n          <hr>\\n          \".concat(results.length ? '<ul>' : '<p>No general information matches that search</p>', \"\\n            \").concat(results.map(function (item) {\n          return \"<li><a href=\\\"\".concat(item.link, \"\\\">\").concat(item.title.rendered, \"</a></li>\");\n        }).join(' '), \"\\n          \").concat(results.length ? '</ul>' : '', \"\\n        \"));\n\n        _this.isSpinnerVisible = false;\n      });\n    }\n  }, {\n    key: \"keyPressDispatcher\",\n    value: function keyPressDispatcher(e) {\n      // console.log(e.keyCode);\n      if (e.keyCode == 83 && !this.isOverlayOpen && !$(\"input, textarea\").is(':focus')) {\n        this.openOverlay();\n      }\n\n      if (e.keyCode == 27 && this.isOverlayOpen) {\n        this.closeOverlay();\n      }\n    }\n  }, {\n    key: \"openOverlay\",\n    value: function openOverlay() {\n      var _this2 = this;\n\n      this.searchOverlay.addClass(\"search-overlay--active\");\n      $('body').addClass('body-no-scroll');\n      this.searchField.val('');\n      setTimeout(function () {\n        return _this2.searchField.focus();\n      }, 301);\n      this.isOverlayOpen = true; // console.log(\"overlay opened\");\n    }\n  }, {\n    key: \"closeOverlay\",\n    value: function closeOverlay() {\n      this.searchOverlay.removeClass('search-overlay--active');\n      $('body').removeClass('body-no-scroll');\n      this.isOverlayOpen = false; // console.log(\"overlay closed\");\n    }\n  }, {\n    key: \"addSearchHTML\",\n    value: function addSearchHTML() {\n      $(\"body\").append(\"\\n      <div class=\\\"search-overlay\\\">\\n        <div class=\\\"search-overlay__top\\\">\\n          <div class=\\\"search-container\\\">\\n            <i class=\\\"fa fa-2x fa-search search-overlay__icon\\\" aria-hidden=\\\"true\\\"></i>\\n            <input type=\\\"text\\\" autocomplete=\\\"off\\\" name=\\\"search-box\\\" class=\\\"searchbox__input\\\" id=\\\"searchbox__input\\\" placeholder=\\\"What are you looking for?\\\">\\n            <i class=\\\"fa fa-2x fa-window-close search-overlay__close\\\" aria-hidden=\\\"true\\\"></i>\\n          </div>\\n\\n        </div>\\n        <div class=\\\"search-overlay__bottom\\\">\\n          <div class=\\\"side-paddings\\\" id=\\\"search-overlay__results\\\">\\n\\n          </div>\\n        </div>\\n\\n      </div>\\n      \");\n    }\n  }]);\n\n  return Search;\n}(); // end of search function\n\n\n/* harmony default export */ __webpack_exports__[\"default\"] = (Search);\n\n//# sourceURL=webpack:///./wp-content/themes/vedyoga/js/modules/searchFunction.js?");

/***/ })

/******/ });