export default {
  init() {
    $(document).ready(function() {
      $("#lightSlider-popular-restaurants").lightSlider({
            item: 2,
            autoWidth: true,
            slideMove: 1, // slidemove will be 1 if loop is true
            slideMargin: 14,
    
            addClass: '',
            mode: "slide",
            useCSS: true,
            cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
            easing: 'linear', //'for jquery animation',////
    
            speed: 400, //ms'
            auto: false,
            loop: false,
            slideEndAnimation: true,
            pause: 2000,
    
            controls: false,

            adaptiveHeight:true,
    
            vertical:false,
            verticalHeight:500,
            vThumbWidth:100,
    
            thumbItem:10,
            pager: false,
            gallery: false,
            galleryMargin: 5,
            thumbMargin: 5,
            currentPagerPosition: 'middle',
    
            enableTouch:true,
            enableDrag:true,
            freeMove:true,
            swipeThreshold: 40,

            responsive : [],
 
            onBeforeStart: function (el) {
              var maxHeight = 0,
              container = $(el),
              children = container.children();
      
              children.each(function () {
                  var childHeight = $(this).height();
                  if (childHeight > maxHeight) {
                      maxHeight = childHeight;
                  }
              });
              container.height(maxHeight);
            },
            onSliderLoad: function (el) {
              var maxHeight = 0,
              container = $(el),
              children = container.children();
      
              children.each(function () {
                  var childHeight = $(this).height();
                  if (childHeight > maxHeight) {
                      maxHeight = childHeight;
                  }
              });
              container.height(maxHeight);
            },
            onBeforeSlide: function (el) {},
            onAfterSlide: function (el) {},
            onBeforeNextSlide: function (el) {},
            onBeforePrevSlide: function (el) {}
        });
      $("#lightSlider-chef-restaurants").lightSlider({
            item: 3,
            autoWidth: true,
            slideMove: 1, // slidemove will be 1 if loop is true
            slideMargin: 14,
    
            addClass: '',
            mode: "slide",
            useCSS: true,
            cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
            easing: 'linear', //'for jquery animation',////
    
            speed: 400, //ms'
            auto: false,
            loop: false,
            slideEndAnimation: true,
            pause: 2000,
    
            controls: false,

            adaptiveHeight:true,
    
            vertical:false,
            verticalHeight:500,
            vThumbWidth:100,
    
            thumbItem:10,
            pager: false,
            gallery: false,
            galleryMargin: 5,
            thumbMargin: 5,
            currentPagerPosition: 'middle',
    
            enableTouch:true,
            enableDrag:true,
            freeMove:true,
            swipeThreshold: 40,

            responsive : [],
 
            onBeforeStart: function (el) {
              var maxHeight = 0,
              container = $(el),
              children = container.children();
      
              children.each(function () {
                  var childHeight = $(this).height();
                  if (childHeight > maxHeight) {
                      maxHeight = childHeight;
                  }
              });
              container.height(maxHeight);
            },
            onSliderLoad: function (el) {
              var maxHeight = 0,
              container = $(el),
              children = container.children();
      
              children.each(function () {
                  var childHeight = $(this).height();
                  if (childHeight > maxHeight) {
                      maxHeight = childHeight;
                  }
              });
              container.height(maxHeight);
            },
            onBeforeSlide: function (el) {},
            onAfterSlide: function (el) {},
            onBeforeNextSlide: function (el) {},
            onBeforePrevSlide: function (el) {}
        });
    });
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
