
$('.navbar-collapse li a').click(function(){
    $('html , body').animate({
    
        scrollTop: $('#' + $(this).data('value')).offset().top-73
    
    }, 1000);
    });

    //scroll nav bar
    $(document).ready(function(){ 

    if (location.pathname == '/project-myserves/' ){
            $(window).scroll(function(){
            $('.navbar-edit').toggleClass("sticky", $(this).scrollTop() > 0);   
             })
     }else if(location.pathname == '/project-myserves/index.php'){
        $(window).scroll(function(){
        $('.navbar-edit').toggleClass("sticky", $(this).scrollTop() > 0); 
        })  

      }else { 
            $('.navbar-edit').removeClass("back-color-nav");
            $('.navbar-edit').addClass("sticky");
       }
});
//new upload
var btnUpload = $("#uploadss_file"),
btnOuter = $(".button_outer");
btnUpload.on("change", function(e){
var ext = btnUpload.val().split('.').pop().toLowerCase();
if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
    $(".error_msg").text("Not an Image...");
} else {
    $(".error_msg").text("");
    btnOuter.addClass("file_uploading");
    setTimeout(function(){
        btnOuter.addClass("file_uploaded");
    },3000);
    var uploadedFile = URL.createObjectURL(e.target.files[0]);
    setTimeout(function(){
        $("#uploaded_view").append('<img  src="'+uploadedFile+'" />').addClass("show");
    },3500);
}
});
$(".file_remove").on("click", function(e){
$("#uploaded_view").removeClass("show");
$("#uploaded_view").find("img").remove();
btnOuter.removeClass("file_uploading");
btnOuter.removeClass("file_uploaded");
});
//serch
$(function() {
    $('.mc-btn-action').click(function () {
         
        var card = $(this).parent('.material-card'),
         icon = $(this).children('i'),
         overs = $(this).siblings('.description-front-box'),
         ovarflowcolor = $(this).siblings('.mc-content'),
         noncolrs = ovarflowcolor.children('.mains-sections');

        icon.addClass('fa-spin-fast');
        if (card.hasClass('mc-active')) {
            card.removeClass('mc-active');
            overs.removeClass('det-display-none');
            noncolrs.addClass('color-overlay-section-main');

            window.setTimeout(function() {
                icon
                    .removeClass('fa-arrow-left')
                    .removeClass('fa-spin-fast')
                    .addClass('fa-bars');

            }, 800);
        } else {
            card.addClass('mc-active');
            overs.addClass('det-display-none');
            noncolrs.removeClass('color-overlay-section-main');


            window.setTimeout(function() {
                icon
                    .removeClass('fa-bars')
                    .removeClass('fa-spin-fast')
                    .addClass('fa-arrow-left');

            }, 800);
        }
    });
});
/*end test */
 
/*details*/
$(document).ready(function(){
  
$(".imge-details-tow img").animate({top:'25%'},2800);
  
$(".h1-detals").animate({width:'170px'},1000).animate({width:'100%'},3000).animate({width:'170px'},2000);
  
$(".prg-dtails").fadeTo(5000,1);
  
$(".ul-details-tow-ico ul").show(3000);
  
$(".ul-details-tow-ico ul li i").animate({marginLeft:"5px"},5000);
});

/*add-img-edit-profile-*/
function readUrledit(event){
    "use strict"
var uploadimge = document.getElementById("uplodeimgedit");
if(event.files){
var readers = new FileReader();
readers.readAsDataURL(event.files[0]);
readers.onload=(download)=>{
uploadimge.src = download.target.result;
}
}
};     
/*add-img-edit-profile-click*/
function uptateimge(){
    "use strict"
var uptateimgeS=document.getElementById("uplode-img-edit");
uptateimgeS.click();};

//dashbord
//slider mainpage 
$(document).ready(function(){
    $("#testimonial-slider").owlCarousel({
        items:3,
        itemsDesktop:[1000,2],
        itemsDesktopSmall:[979,2],
        itemsTablet:[768,2],
        itemsMobile:[650,1],
        pagination:false,
        navigation:true,
        navigationText:["",""],
        autoPlay:true
    });
});
//loding
$(window).load(function () {
    
    "use strict";
    
    // Loading Elements
    
    $(".loading-overlay .load hr").fadeOut(2500, function () {
        
        // Show The Scroll

        $("body").css("overflow-y", "auto");
        
        $(this).parent().fadeOut(50, function () {
            
            $(".loading-overlay ").remove();
        });
    });
});
document.getElementById("requst").onkeyup=function(){
    var input1= Number(document.getElementById("requst").value);
    var numVal2 = Number(document.getElementById("discount").value=5) / 100;
    var totalValue = input1 - (input1 * numVal2);
    var input5=document.getElementById("discount-tow").value=input1-totalValue;
    document.getElementById("moyna").value = totalValue.toFixed(2);
};
function createAlert(title, summary, details, severity, dismissible, autoDismiss, appendToId) {
    var iconMap = {
     
      success: "fa fa-thumbs-up",
     
    
    };
  
    var iconAdded = false;
  
    var alertClasses = ["alert", "animated", "flipInX"];
    alertClasses.push("alert-" + severity.toLowerCase());
  
    if (dismissible) {
      alertClasses.push("alert-dismissible");
    }
  
    var msgIcon = $("<i />", {
      "class": iconMap[severity] // you need to quote "class" since it's a reserved keyword
    });
  
    var msg = $("<div />", {
      "class": alertClasses.join(" ") // you need to quote "class" since it's a reserved keyword
    });
  
    if (title) {
      var msgTitle = $("<h4 />", {
        html: title
      }).appendTo(msg);
      
      if(!iconAdded){
        msgTitle.prepend(msgIcon);
        iconAdded = true;
      }
    }
  
    if (summary) {
      var msgSummary = $("<strong />", {
        html: summary
      }).appendTo(msg);
      
      if(!iconAdded){
        msgSummary.prepend(msgIcon);
        iconAdded = true;
      }
    }
  
    if (details) {
      var msgDetails = $("<p />", {
        html: details
      }).appendTo(msg);
      
      if(!iconAdded){
        msgDetails.prepend(msgIcon);
        iconAdded = true;
      }
    }
    
  
    if (dismissible) {
      var msgClose = $("<span />", {
        "class": "close", // you need to quote "class" since it's a reserved keyword
        "data-dismiss": "alert",
        html: "<i class='fa fa-times-circle'></i>"
      }).appendTo(msg);
    }
    
    $('#' + appendToId).prepend(msg);
    
    if(autoDismiss){
      setTimeout(function(){
        msg.addClass("flipOutX");
        setTimeout(function(){
          msg.remove();
        },1000);
      }, 5000);
    }
  }
