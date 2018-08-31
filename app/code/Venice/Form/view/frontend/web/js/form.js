define([
    'jquery',
    'dropzone',
    'md5'
], function($, dropzone, md5){

    $.widget('venice.form', {

        _next: function() {
            var self = this;
            $('#next').on('click', function (e) {
                e.preventDefault();
                if (!self._checkAll()) {
                    $("#input-form :input").prop("disabled", true);
                    $('.dropzone').css({pointerEvents: "none"});
                    $('#next-button').hide();
                    $(':input[type="submit"]').prop('disabled', false);
                    $('#show-button').show();
                }
            })
        },


        _checkAll: function () {
            var mistake = false;
            var self =this;
            $(':input[name]', $('#input-form')).each(function () {
                var value = $(this).val();
                var regex = $(this).data('pattern');
                var errorMessage = $(this).data('message');
                if (typeof regex !== "undefined") {
                    if (!self._validation(value, regex)) {
                        $(this).closest('li').find('.errorMessageBox').html(errorMessage);
                        mistake = true;
                        }
                }
                var required = $(this).data('required');
                if (!required) {
                    if ($.trim(value) === "") {
                        $(this).closest('li').find('.errorMessageBox').html("This is a required field.");
                        mistake = true;
                    }
                }
                var sign_up = $(".agreement");
                var checkbox = sign_up.length;

                if (checkbox > 0) {
                    var checkBoxValue = (sign_up.is(":checked"));

                    if (!checkBoxValue) {
                        $('.sign-up').css({color: 'red'});
                        mistake = true;
                    }
                }
            });
            return mistake;
        },

        _validation: function (value, regexString) {
            var regExp = new RegExp(regexString);
            return regExp.test(value);
        },

        _create: function() {// special method of jQuery UI Widgets
            var self = this;

            dropzone.autoDiscover = false;
            var myDrozone = new dropzone ("#input-form",{
                autoProcessQueue: false,
                uploadMultiple: true,
                parallelUploads: 100,
                maxFiles: 3,
                maxFilesize: 5,
                acceptedFiles: ".png, .jpg, .jpeg, .gif, .bmp",
                addRemoveLinks: true,
                previewsContainer: ".dropzone",
                clickable: ".dropzone",
                dictFileTooBig: "File is to big ({{filesize}}mb). Max allowed file size is {{maxFilesize}}mb",
                dictInvalidFileType: "Invalid File Type",
                dictCancelUpload: "Cancel",
                dictRemoveFile: "Remove",
                dictMaxFilesExceeded: "Only {{maxFiles}} files are allowed",

                renameFile: function (file) {
                    var index = file.name.lastIndexOf('.');
                    var format = file.name.substring(index, file.length);
                    var fileName = md5(file.name);
                    let newName = fileName.substr(0, 10) +'_'+ new Date().getTime() % 10e10 + '' + format;
                    return newName;
                },

                init: function () {
                    var myDrop = this;
                    $("#submit").on("click", function (e) {
                        if (myDrop.files.length > 0) {
                            e.preventDefault();
                            e.stopPropagation();
                            myDrop.processQueue();
                        }else {
                            $("#input-form :input").prop("disabled", false);
                        }
                    });

                    this.on("addedfile", function(files){
                       $('.dropzone-message').hide();
                    });
                    this.on("successmultiple", function(files, response) {
                        $('#redirect-page').submit();
                    });

                    this.on("error", function(files, response) {
                        $('.dropzone-error-message').html(response);
                        this.removeFile(files);
                    });
                }
            });

            $(':input[name]', $('#input-form')).each(function () {
                var errorMsgElement = document.createElement('div');
                errorMsgElement.className = "errorMessageBox";
                $(this).closest('li').append(errorMsgElement);
                $(this).bind('input propertychange', function () {
                    var value = $(this).val();
                    var regex = $(this).data('pattern');
                    var errorMessage = $(this).data('message');
                    if (typeof regex !== "undefined") {
                        if (!self._validation(value, regex)) {
                            $(errorMsgElement).html(errorMessage);
                        } else {
                            $(errorMsgElement).html('');
                        }
                    }
                });
            });
            this._next();
        }
    });

    return $.venice.form;
});