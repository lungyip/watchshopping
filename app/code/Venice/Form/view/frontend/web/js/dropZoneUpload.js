define([
    'jquery',
    'dropzone',
    'md5'
], function($, dropzone, md5) {
    $.widget('venice.dropzone', {

        _create: function () {// special method of jQuery UI Widgets

            new dropzone ("#input-form",{
                autoProcessQueue: false,
                uploadMultiple: true,
                parallelUploads: 100,
                maxFiles: 3,
                maxFilesize: 5,
                acceptedFiles: ".png, .jpg, .jpeg, .gif, .bmp",
                addRemoveLinks: true,
                previewsContainer: "#dropzone-display",
                clickable: "#dropzone-display",

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
                        }
                    });

                    this.on("successmultiple", function(files, response) {
                        $('#redirect-page').submit();
                    });

                    this.on("error", function(files, response) {
                        var errorMsgElement = document.createElement('div');
                        errorMsgElement.className = "message info";
                        $('.form').append(errorMsgElement).html('We can\'t upload image, please check there are any images is not a image.');
                        $('.fieldset').show();
                        $('#show-detail').hide();
                        $('#next').show();
                    });
                }
            })

        }
    });
    return $.venice.dropzone;
});