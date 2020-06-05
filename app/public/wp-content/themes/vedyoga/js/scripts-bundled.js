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
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _modules_searchFunction__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./modules/searchFunction */ \"./wp-content/themes/vedyoga/js/modules/searchFunction.js\");\n/* harmony import */ var _modules_searchFunction__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_modules_searchFunction__WEBPACK_IMPORTED_MODULE_0__);\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nfunction _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }\n\nfunction _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }\n\n\n\nwindow.onbeforeunload = function () {\n  window.scrollTo(0, 0);\n};\n\n$(document).ready(function () {\n  // mobile iconbar and openClose\n  $('.mobile-nav-btn').on('click', function () {\n    $(this).toggleClass('x');\n    $('.nav-items-wrapper .nav-items').toggleClass('nav-close');\n  }); // window on scroll menu background change with boxshadow\n\n  window.onscroll = function () {\n    scrollFunction();\n  };\n\n  function scrollFunction() {\n    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {\n      $('.nav-main-wrapper').removeClass('on-scroll-nav--change');\n      $('.nav-all-wrap').addClass('box-shadow');\n    } else {\n      $('.nav-main-wrapper').addClass('on-scroll-nav--change');\n      $('.nav-all-wrap').removeClass('box-shadow');\n    }\n  } //Adding hover effects on menu items\n\n\n  $('#top-nav').find('.nav-items-wrapper .nav-items .nav-item').addClass('hvr-overline-from-left hvr-sweep-to-right'); // Search function\n\n  var Search = /*#__PURE__*/function () {\n    // 1. descrine create and create/initiate our object// features of an object\n    function Search() {\n      _classCallCheck(this, Search);\n\n      this.openButton = $('.js-search-trigger');\n      this.closeButton = $('.search-overlay__close');\n      this.searchOverlay = $('.search-overlay');\n      this.searchField = $('#searchbox__input');\n      this.events();\n      this.isOverlayOpen = false;\n      this.typingTimer;\n    } // 2 Events\n\n\n    _createClass(Search, [{\n      key: \"events\",\n      value: function events() {\n        this.openButton.on('click', this.openOverlay.bind(this));\n        this.closeButton.on('click', this.closeOverlay.bind(this)); // $(document).on(\"keyup\", this.keyPressDispatcher.bind(this));\n\n        $(document).on(\"keydown\", this.keyPressDispatcher.bind(this));\n        this.searchField.on(\"keydown\", this.typingLogic.bind(this));\n      } // 3 Methods (functions , actions etc)\n\n    }, {\n      key: \"typingLogic\",\n      value: function typingLogic() {\n        clearTimeout(this.typingTimer);\n        this.typingTimer = setTimeout(function () {\n          console.log('this is a time out test');\n        }, 2000);\n      }\n    }, {\n      key: \"keyPressDispatcher\",\n      value: function keyPressDispatcher(e) {\n        // console.log(e.keyCode);\n        if (e.keyCode == 83 && !this.isOverlayOpen) {\n          this.openOverlay();\n        }\n\n        if (e.keyCode == 27 && this.isOverlayOpen) {\n          this.closeOverlay();\n        }\n      }\n    }, {\n      key: \"openOverlay\",\n      value: function openOverlay() {\n        this.searchOverlay.addClass(\"search-overlay--active\");\n        $('body').addClass('body-no-scroll');\n        this.isOverlayOpen = true; // console.log(\"overlay opened\");\n      }\n    }, {\n      key: \"closeOverlay\",\n      value: function closeOverlay() {\n        this.searchOverlay.removeClass('search-overlay--active');\n        $('body').removeClass('body-no-scroll');\n        this.isOverlayOpen = false; // console.log(\"overlay closed\");\n      }\n    }]);\n\n    return Search;\n  }(); // end of search function\n\n\n  var magicalSearch = new Search();\n});\n\n//# sourceURL=webpack:///./wp-content/themes/vedyoga/js/custom.js?");

/***/ }),

/***/ "./wp-content/themes/vedyoga/js/modules/searchFunction.js":
/*!****************************************************************!*\
  !*** ./wp-content/themes/vedyoga/js/modules/searchFunction.js ***!
  \****************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("alert('search');\n\n//# sourceURL=webpack:///./wp-content/themes/vedyoga/js/modules/searchFunction.js?");

/***/ })

/******/ });