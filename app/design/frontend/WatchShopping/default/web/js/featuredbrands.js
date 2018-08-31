define([
    'jquery',
    'slick'
], function ($,slick) {

    'use strict';
    $.widget('venice.featuredbrandbar', {

        options:{
            triggerEvent: 'click'
        },

        _create: function() {
            this._bind();
        },

        _bind: function() {
            var self = this;
            $(self.element).slick({"slidesToShow":4,"slidesToScroll": 1,'variableWidth': true});
        },

    });

    return $.venice.featuredbrandbar;
})