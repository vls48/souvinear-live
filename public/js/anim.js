  
var swapmicro = document.getElementById('swap_micro');
var inbox = document.getElementById('swap_inbox_micro');
var pin = document.getElementById('pin_micro');


// Click function for swap animation

  $("#swap_micro").click(function() {
  console.log('heyeyeyey');
  
    if (this.classList.contains('swap_btn')) {
  
     this.classList.add('swap_play');
    } else {
  
    }
  });

  
  
  // Click function for swap inbox animation

if (inbox){  
    
  inbox.addEventListener('mouseenter', function () {
  console.log("hover");
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
  
  
  