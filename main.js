require('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js')

function findOutMore(e) {
  e.preventDefault();
  $('html, body').animate({
    scrollTop: $("#learnMoreContent").offset().top
  }, 750);
  }
