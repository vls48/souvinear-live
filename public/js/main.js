// Passing it page you want to jump too, location.href (best way to go to pages) works online and locally = page you want to go to 
function jmp2LocalPage(whichPage) {
    location.href = whichPage;
  }
  
  $("#nav_button").click(function(event) {
  
      $("#nav_button").toggleClass("pull_up");
      $(".nav_contain").toggleClass("toggle_nav");
  
     if($(this).hasClass('pull_up')){
          $(this).removeClass('pull_down');
      } else {
          $(this).addClass('pull_down');
      }
  
  });
  
  
  
  
var swapmicro = document.getElementById('swap_micro');
var inbox = document.getElementById('swap_inbox_micro');
var pin = document.getElementById('pin_micro');


// Click function for swap animation
if (swapmicro){

  swapmicro.addEventListener('click', function () {
  
    if (this.classList.contains('swap_btn')) {
  
     this.classList.add('swap_play');
    } else {
  
    }
  });

}
  
  
  // Click function for swap inbox animation

if (inbox){  
    
  inbox.addEventListener('mouseenter', function () {
  
    if (this.classList.contains('swap_inbox_btn')) {
  
     this.classList.add('swap_inbox_play');
    } else {
  
    }
  });
}
  
  
  // Click function for pinning songs 
 if (pin){ 

  pin.addEventListener('click', function () {
  
    if (this.classList.contains('add_pin')) {
  
     this.classList.add('pin_selected');
    } else {
  
    }
  });
  
}
  
  
  
  


















