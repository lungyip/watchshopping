define([
    'jquery'
], function ($) {

    $.widget('venice.readmore', {

        options:{
            height : '0px'
        },
        readMoreHeightCheck: function (ele) {
            if ($(ele).prev().children().height() > $(ele).prev().height()) {
                $(ele)
                    .text('Read More')
                    .addClass('show');
            } else {
                $(ele)
                    .text('')
                    .removeClass('show');
            }
        },
        _create: function() {
            this._super();

            var self = this.element;
            var divHeight = this.options.height;

            $(self).prev().height(divHeight);
            this.readMoreHeightCheck(this.element);
            $(window).resize(this.readMoreHeightCheck.bind(this, this.element));


            $(self).click(function(){
                $(self).prev().toggleClass('open');
                var text = $(self).text();
                if(text == "Read More") {
                    $(self).prev().animate({height:$(self).prev().children().height()});
                    $(self).text("Read Less");
                } else {
                    $(self).prev().animate({height:divHeight});
                    $(self).text("Read More");
                }
            });
        }

    });

    return $.venice.readmore;
})