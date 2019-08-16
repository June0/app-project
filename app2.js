/**
 * Created by zhu on 2016/12/28.
 */

$(document).ready(function (){
    $("#tabfirst li").each(function (index) {
        var liNode = $(this);
        $(this).mouseover(function () {
            $("div.content1").removeClass("content1");
            $("#tabfirst a.tabin").removeClass("tabin");
            $("div").eq(index).addClass("content1");
            liNode.addClass("tabin");
        }).mouseout(function () {
        })
    })
})