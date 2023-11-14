/*!
 *  admin js.
 */

(function($) {

"use strict";

$(document).ready(function($){

  function mediaJpegQualityNumber() {
    var checkbox = $('#bt_jpeg_quality');
    var element = $('.jpeg-quality-number');
    var numberInput = $('.jpeg-quality-number input[type="number"]');
    var defaultValue = "82";

    var isChecked = localStorage.getItem('jpegQualityChecked');
    if (isChecked === 'true') {
      checkbox.prop('checked', true);
      element.show();
    } else {
      checkbox.prop('checked', false);
      element.hide();
      numberInput.val(defaultValue);
    }

    checkbox.on('change', function() {
      if (this.checked) {
        element.show();
        localStorage.setItem('jpegQualityChecked', 'true');
      } else {
        element.hide();
        numberInput.val(defaultValue);
        localStorage.setItem('jpegQualityChecked', 'false');
      }
    });
  }
  mediaJpegQualityNumber();

  function revisionsNumber() {
    var selectField = $('#bt_revisions_status');
    var element = $('.revisions-limit-number');
    var numberInput = $('.revisions-limit-number input[type="number"]');
    var defaultNumber = 2;
  
    selectField.on('change', function() {
      if (this.value === 'limit') {
        element.show();
      } else {
        element.hide();
        numberInput.val(defaultNumber);
      }
    });
  
    if (selectField.val() === 'limit') {
      element.show();
    } else {
      element.hide();
      numberInput.val(defaultNumber);
    }
  }
  revisionsNumber();

});

})(jQuery);
