var mybutton = document.getElementById("myBut");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
// $('input.input-qty').each(function() {
//   var $this = $(this),
//     qty = $this.parent().find('.is-form'),
//     min = Number($this.attr('min')),
//     max = Number($this.attr('max'))
//   if (min == 0) {
//     var d = 0
//   } else d = min
//   $(qty).on('click', function() {
//     if ($(this).hasClass('minus')) {
//       if (d > min) d += -1
//     } else if ($(this).hasClass('plus')) {
//       var x = Number($this.val()) + 1
//       if (x <= max) d += 1
//     }
//     $this.attr('value', d).val(d)
//   })
// })