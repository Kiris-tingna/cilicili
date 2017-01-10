/**
 * Created by kiristingna on 2016/12/31.
 */
'use strict';

$(function () {
    /**
     * ------------------ init part ------------------
     */
    $('.date-picker').datepicker({});

    /**
     * ------------------ url functions part ------------------
     */
    var urls = {
        LIKE_ANIMATE: '/like/a/',
        LIKE_VIDEO: '/like/v/',
        CATE_INSERT: '/special/insert',
        CATE_GET: '/special/category',
        CATE_UPDATE: '/special/update',
    };

    $.ajaxSetup({
        headers: {
            'X-XSRF-TOKEN': $.cookie('XSRF-TOKEN')
        }
    });
    /**
     * ------------------ 点赞 ------------------------
     */
    $(".la-like-vid").on('click', function() {
        var $id = $(this).data("id");
        $.ajax({
            url: urls.LIKE_VIDEO,
            type: 'POST',
            dataType: 'json',
            data: {id: $id}
        }).done(function (data) {
            console.log(data)
        })
    });

    $(".la-like-spe").on('click', function() {
        var $id = $(this).data("aid");
        console.log($id);

        $.ajax({
            url: urls.LIKE_ANIMATE,
            type: 'POST',
            contentType: "application/json; charset=utf-8",
            dataType: 'json',
            data: JSON.stringify({id: $id})
        }).done(function (data) {
            console.log(data)
        })
    });

    /**
     * --------------- admin operation --------------------
     */

    function getCates(sid) {
        $.ajax({
            url: urls.CATE_GET,
            type: 'GET',
            dataType: 'json',
            data: {id: sid}
        }).done(function (data) {
            var _label = $(".la-admin-label[data-sid='"+ sid +"']");
            _label.empty();
            var str = '';
            $.map(data.data, function(ele, i) {
                str += '<label>'+ ele.band + '</label>'
            });
            _label.append(str);
        })
    }
    $('.la-admin-select').on('change', function() {
        $(this).siblings('.la-admin-cate').data('id', $(this).val());
        $(this).siblings('.la-admin-sync').data('id', $(this).val());
    });
    $('.la-admin-cate').on('click', function() {
        var $id = $(this).data('id');
        var $sid = $(this).data('sid');

        $.ajax({
            url: urls.CATE_INSERT,
            type: 'POST',
            dataType: 'json',
            data: {id: $id, sid: $sid}
        }).done(function (data) {
            getCates($sid)
        })
    });
    $('.la-admin-sync').on('click', function() {
        var $id = [$(this).data('id')];
        var $sid = $(this).data('sid');

        $.ajax({
            url: urls.CATE_UPDATE,
            type: 'POST',
            dataType: 'json',
            data: {id: $sid, cid: $id}
        }).done(function (data) {
            getCates($sid)
        })
    })
});