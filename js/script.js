//================================== Menu Button =====================================//
var btn = document.getElementById('nav-button');
const out = document.getElementById('links');
const btnstyle = document.getElementById('nav-button');
const body = document.body;

btn.addEventListener('click', function(){
  if(out.style.display === "block"){
    out.style.display = "none";
  }else{
      out.style.display = "block";
  }
    
});

//click outside of menu dropdown box closes menu
window.addEventListener('mouseup', function(event){
  if (event.target != btn && event.target.parentNode != btn){
        out.style.display = 'none';
    }
});


btn.addEventListener('mousedown', (e) => { 
  e.preventDefault() 
});

//================================== Scroll to Top =====================================//
$(function() {
   
  $(window).on('scroll', function(){

    //if screen greater than 50 => fadein(); and show(); 
    if($(this).scrollTop() > 50) showBtn(); 
    else{
      $('#topBtn').show();
    }

    function showBtn(){
        $('#topBtn').show();
    }

  });


  // when button is clicked, scrolls pages to top. 
  $('#topBtn').on('click', function() {
    $(window).scrollTop(0);
  });


//================================== Video Modal =====================================//

    //videosrc
    var $videoSrc; 
    $('#video-btn').on('click', function(){
      $videoSrc = $(this).data("src");
      });
    console.log($videoSrc);
    
    // when the modal is opened autoplay it  
    $('#myModal').on('shown.bs.modal', function (e) {
      $("#video").attr('src', $videoSrc + "?vq=hd1080&autoplay=1&rel=0&fs=0");
    })

    $('#myModal').on('hide.bs.modal', function (e) {
      $("#video").attr('src',$videoSrc); 
    })

//================================== Slick Slider Controls =====================================//

  //================================= index Slider =================================// 
  $('.card-slider-container').slick({
  dots: false,
  infinite: true,
  autoplay: true,
  autoplaySpeed: 6000, // speed is in milliseconds
  speed: 300,
  arrow: true,
  mobileFirst:true,
  responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
          dots: false
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      
    ]
  });

  //================================= Research Slider =================================// 
  $('.card-slider-container-research').slick({
  dots: false,
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 6000, // speed is in milliseconds
  speed: 300,
  arrow: true,
  mobileFirst:true,
  responsive: [
      {
        breakpoint: 1300,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1,
          dots: true
        }
      },
      {
        breakpoint: 875,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 590,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      
    ]
  });

  //================================== Lightbox Controls =====================================//

});

    






