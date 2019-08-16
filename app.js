/**
 * Created by zhu on 2016/12/13.
 */
$(document) .ready(function(){
    $("#realcontent").load("mytab.html");
    $("#tabsecond a").each(function(index){
        $(this).click(function(){
            // $("#tablesecond a.tabin").removeClass("tabin");
            // $(this).addClass("tabin");
            if(index==0){
                $("#realcontent").load("mytab.html");
            }else if(index==1){
                $("#realcontent").load("mytab2.html");
            }else if(index==2){
                $("#realcontent").load("mytab3.html");
            }else if(index==3){
                $("#realcontent").load("mytab4.html");
            }else if(index==4){
                $("#realcontent").load("mytab5.html");
            }else if(index==5){
                $("#realcontent").load("mytab6.html");
            }else if(index==6){
                $("#realcontent").load("mytab7.html");
            }else if(index==7){
                $("#realcontent").load("mytab8.html");
            }
        })
    })
});




