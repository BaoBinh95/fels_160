window.$ = window.jQuery = require('jquery')
require('bootstrap-sass');

// add word answer
$(document).ready(function() {
    var i = 0;
    var tmp = 0;
    $("#add").click(function() {
        if($("div[id*='answer']").length >= 4) {
            alert('trans('settings.alert_add_words_answer')');
        }
        else {
            var rowAnswer = $("<div class='row' id='answer'/>");
            var md1 = $("<div class='col-md-6' />");
            var md2 = $("<div class='col-md-6' />");
            var formGroup1 = $("<div class='form-group' />");
            var formGroup2 = $("<div class='form-group' />");
            var content = $("<input class='form-control content-answer' placeholder='Please Enter Answer Content' name=\"word[][answer]\" type='text' id='' />");
            var labelCorrect = $("<label for='correct'>Is Correct</label>");
            var inputCorrectHidden = $("<input name=\"word[][correct]\" type='hidden' id='correct' value='0'/>");
            var inputCorrect = $("<input name=\"word[][correct]\" type='radio' id='correct' value='1'/>");
            var removeButton = $("<input type=\"button\" class=\"remove btn btn-danger\" value=\"Remove\" />");
            removeButton.click(function() {
                $(this).parent().parent().parent().remove();
            });
            formGroup1.append(content);
            formGroup2.append(labelCorrect);
            formGroup2.append(inputCorrectHidden);
            formGroup2.append(inputCorrect);
            formGroup2.append(removeButton);
            md1.append(formGroup1);
            md2.append(formGroup2);
            rowAnswer.append(md1);
            rowAnswer.append(md2);
            $('.answerDiv').append(rowAnswer);
            i++;
        }
    });
});
