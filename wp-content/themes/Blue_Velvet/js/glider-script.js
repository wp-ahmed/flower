window.addEventListener('load', function(){
    new Glider(document.querySelector('.glider'), {
       slidesToShow: 2,
       dots: '#dots',
        arrows: {
            prev: '.glider-prev',
            next: '.glider-next'
          }
       ,responsive: [
          {
             // screens greater than >= 0
             breakpoint: 0,
             settings: {
               // Set to `auto` and provide item width to adjust to viewport
               slidesToShow: 1,
               slidesToScroll: 1,
               itemWidth: 150,
               duration: 0.25,
               
             }
           },
           {
            // screens greater than >= 775px
            breakpoint: 630,
            settings: {
              // Set to `auto` and provide item width to adjust to viewport
              slidesToShow: 2,
              slidesToScroll: 1,
              itemWidth: 150,
              duration: 0.25,
              
            }
          },
          {
            // screens greater than >= 775px
            breakpoint: 775,
            settings: {
              // Set to `auto` and provide item width to adjust to viewport
              slidesToShow: 3,
              slidesToScroll: 1,
              itemWidth: 150,
              duration: 0.25,
              
            }
          },{
            // screens greater than >= 1024px
            breakpoint: 1024,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 1,
              itemWidth: 150,
              duration: 0.25,
            }
          }
        ]
     });
  })