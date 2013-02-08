$ = jQuery;

$(document).ready(function(){
    $('#datepicker').datepicker();

    $(".showFixas").click(function(){
       $(".links").removeClass("current");
       $(this).addClass("current");
       $(".despesas").fadeOut("slow");
       $(".fixas").fadeIn("slow");
       return false;
    });
    $(".showVariaveis").click(function(){
       $(".links").removeClass("current");
       $(this).addClass("current");
       $(".despesas").fadeOut("slow");
       $(".variaveis").fadeIn("slow"); 
       return false;
    });
    $(".showExtras").click(function(){
       $(".links").removeClass("current");
       $(this).addClass("current");
       $(".despesas").fadeOut("slow");
       $(".extras").fadeIn("slow"); 
       return false;
    });
});

