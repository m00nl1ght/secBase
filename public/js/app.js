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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _createForOfIteratorHelper(o, allowArrayLike) { var it; if (typeof Symbol === "undefined" || o[Symbol.iterator] == null) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = o[Symbol.iterator](); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

var surnameElem = $("#visitor_surname");
var nameElem = $("#visitor_name");
var patronymicElem = $("#visitor_patronymic");
var firmElem = $("#visitor_firm"); //отправка запроса

var sendRequest = function sendRequest(key, data) {
  var url = '';

  if (window.location.pathname == '/visitor/new') {
    url = "/visitor/autoinsert";
  } else if (window.location.pathname == '/car/new') {
    url = "/car/autoinsert";
  }

  var request = $.ajax({
    url: url,
    type: "POST",
    data: {
      "_token": $('meta[name="csrf-token"]').attr('content'),
      "key": key,
      "data": data
    },
    dataType: "json"
  });
  return request;
}; //вставка в форму автоподстановки


var insertIntoForm = function insertIntoForm(data) {
  surnameElem.val(data.surname);
  nameElem.val(data.name);
  patronymicElem.val(data.patronymic);
  $("#visitor_phone").val(data.phone);
  firmElem.val(data.firm.name);
};

surnameElem.keyup(function () {
  if (this.value.length >= 3) {
    var resp = sendRequest('surname', this.value);
    resp.done(function (response) {
      $("#autosubstitution").empty();
      response.forEach(function (element) {
        //собираем варианты автоподстановки
        var newElem = $('<li class="p-0 my-1 list-group-item"></li>');
        var newElemForm = $("<form action=\"#\" method=\"post\" name=\"".concat(element.id, "\"></form"));
        var newElemFormButton = $('<button class="w-100 btn btn-outline-secondary text-left" type="submit"></button>');
        newElemFormButton.text("".concat(element.surname, " ").concat(element.name, " ").concat(element.patronymic));
        newElemForm.append(newElemFormButton).submit(function () {
          //обработчик форм автоподстановки
          event.preventDefault();
          var resp = sendRequest('id', $(this).attr('name'));
          resp.done(function (response) {
            insertIntoForm(response);
          });
        });
        $("#autosubstitution").append(newElem.append(newElemForm)); //выводим собранные варианты на экран
      });
    });
  }
}); //показать варианты автоподскановки при фокусе

surnameElem.focus(function () {
  var insertElem = $('<ul id="autosubstitution" class="position-absolute w-100 m0 list-group bg-light"></ul>');
  surnameElem.after(insertElem);
}); //скрыть варианты автоподскановки при фокусе

surnameElem.blur(function () {
  setTimeout(function () {
    $("#autosubstitution").remove();
  }, 300);
}); //инпуты с большой буквы

var inputBigLetterElem = document.querySelectorAll(".capitalize");
inputBigLetterElem.forEach(function (e) {
  e.addEventListener("input", function () {
    this.value = this.value[0].toUpperCase() + this.value.slice(1);
  });
}); //чекбоксы

var checkboxAllElem = document.querySelectorAll('input[type=checkbox]');

var _iterator = _createForOfIteratorHelper(checkboxAllElem),
    _step;

try {
  for (_iterator.s(); !(_step = _iterator.n()).done;) {
    var checkBox = _step.value;
    checkBox.addEventListener('click', function (elem) {
      return elem.target.toggleAttribute('checked');
    });
  } //группы чекбоксов

} catch (err) {
  _iterator.e(err);
} finally {
  _iterator.f();
}

var checkboxMainElem = document.querySelectorAll('.js-checkbox-main');
checkboxMainElem.forEach(function (elem) {
  elem.addEventListener('click', function (el) {
    checkboxElems = el.target.closest('.js-checkbox').querySelectorAll('.js-checkbox-sub');

    if (el.target.getAttribute('aria-checked') == 'false') {
      el.target.setAttribute('aria-checked', 'true');

      if (el.target.getAttribute('name')) {
        sub = document.querySelector('.js-checkbox-' + el.target.getAttribute('name'));
        sub.removeAttribute('disabled');
      }

      checkboxElems.forEach(function (elems) {
        elems.closest('label').classList.remove('text-secondary');
        elems.removeAttribute('disabled');
      });
    } else {
      el.target.setAttribute('aria-checked', 'false');

      if (el.target.getAttribute('name')) {
        sub = document.querySelector('.js-checkbox-' + el.target.getAttribute('name'));
        sub.closest('label').classList.add('text-secondary');
        sub.setAttribute('disabled', 'disabled');
        sub.checked = false;
        sub.removeAttribute('checked');
        sub.setAttribute('aria-checked', 'false');
        subChildren = sub.closest('.js-checkbox').querySelectorAll('.js-checkbox-sub');
        subChildren.forEach(function (elems) {
          elems.closest('label').classList.add('text-secondary');
          elems.setAttribute('disabled', 'disabled');
          elems.checked = false;
          elems.removeAttribute('checked');
        });
      }

      checkboxElems.forEach(function (elems) {
        elems.closest('label').classList.add('text-secondary');
        elems.setAttribute('disabled', 'disabled');
        elems.checked = false;
        elems.removeAttribute('checked');
      });
    }
  });
});

/***/ }),

/***/ "./resources/sass/act_printBlank.scss":
/*!********************************************!*\
  !*** ./resources/sass/act_printBlank.scss ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/car_reportBlank.scss":
/*!*********************************************!*\
  !*** ./resources/sass/car_reportBlank.scss ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/reportBlank.scss":
/*!*****************************************!*\
  !*** ./resources/sass/reportBlank.scss ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!**************************************************************************************************************************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ./resources/sass/car_reportBlank.scss ./resources/sass/reportBlank.scss ./resources/sass/act_printBlank.scss ***!
  \**************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\Users\kovesh1\Desktop\skillBox\OSPanel\domains\secBase\resources\js\app.js */"./resources/js/app.js");
__webpack_require__(/*! C:\Users\kovesh1\Desktop\skillBox\OSPanel\domains\secBase\resources\sass\app.scss */"./resources/sass/app.scss");
__webpack_require__(/*! C:\Users\kovesh1\Desktop\skillBox\OSPanel\domains\secBase\resources\sass\car_reportBlank.scss */"./resources/sass/car_reportBlank.scss");
__webpack_require__(/*! C:\Users\kovesh1\Desktop\skillBox\OSPanel\domains\secBase\resources\sass\reportBlank.scss */"./resources/sass/reportBlank.scss");
module.exports = __webpack_require__(/*! C:\Users\kovesh1\Desktop\skillBox\OSPanel\domains\secBase\resources\sass\act_printBlank.scss */"./resources/sass/act_printBlank.scss");


/***/ })

/******/ });