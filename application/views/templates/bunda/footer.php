<footer class="footer pt-5 mt-5">
   <hr class="horizontal dark">
   <div class="container">
      <div class=" row">
         <div class="col-12">
            <div class="text-center">
               <p class="text-sm">
                  All rights reserved. Copyright © <script>
                     document.write(new Date().getFullYear())
                  </script> <?= 'Posyandu ' . $user['n_posyandu'] ?> <a href="#" target="_blank"></a>.
               </p>
            </div>
         </div>
      </div>
   </div>
</footer>
<!--   Core JS Files   -->
<script src="<?= base_url("assets/js/soft-ui/") ?>core/popper.min.js" type="text/javascript"></script>
<script src="<?= base_url("assets/js/soft-ui/") ?>core/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= base_url("assets/js/soft-ui/") ?>plugins/perfect-scrollbar.min.js"></script>
<!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
<script src="<?= base_url("assets/js/soft-ui/") ?>plugins/countup.min.js"></script>
<!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
<script src="<?= base_url("assets/js/soft-ui/") ?>plugins/parallax.min.js"></script>
<!-- Control Center for Soft UI Kit: parallax effects, scripts for the example pages etc -->
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
<script src="<?= base_url("assets/js/soft-ui/") ?>soft-design-system.min.js?v=1.0.9" type="text/javascript"></script>
<script>
   // get the element to animate
   var element = document.getElementById('count-stats');
   var elementHeight = element.clientHeight;

   // listen for scroll event and call animate function

   document.addEventListener('scroll', animate);

   // check if element is in view
   function inView() {
      // get window height
      var windowHeight = window.innerHeight;
      // get number of pixels that the document is scrolled
      var scrollY = window.scrollY || window.pageYOffset;
      // get current scroll position (distance from the top of the page to the bottom of the current viewport)
      var scrollPosition = scrollY + windowHeight;
      // get element position (distance from the top of the page to the bottom of the element)
      var elementPosition = element.getBoundingClientRect().top + scrollY + elementHeight;

      // is scroll position greater than element position? (is element in view?)
      if (scrollPosition > elementPosition) {
         return true;
      }

      return false;
   }

   var animateComplete = true;
   // animate element when it is in view
   function animate() {

      // is element in view?
      if (inView()) {
         if (animateComplete) {
            if (document.getElementById('state1')) {
               const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
               if (!countUp.error) {
                  countUp.start();
               } else {
                  console.error(countUp.error);
               }
            }
            if (document.getElementById('state2')) {
               const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
               if (!countUp1.error) {
                  countUp1.start();
               } else {
                  console.error(countUp1.error);
               }
            }
            if (document.getElementById('state3')) {
               const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
               if (!countUp2.error) {
                  countUp2.start();
               } else {
                  console.error(countUp2.error);
               };
            }
            animateComplete = false;
         }
      }
   }

   if (document.getElementById('typed')) {
      var typed = new Typed("#typed", {
         stringsElement: '#typed-strings',
         typeSpeed: 90,
         backSpeed: 90,
         backDelay: 200,
         startDelay: 500,
         loop: true
      });
   }
</script>
<script>
   if (document.getElementsByClassName('page-header')) {
      window.addEventListener('scroll', function() {
         var scrollPosition = window.pageYOffset;
         var bgParallax = document.querySelector('.page-header');
         var limit = bgParallax.offsetTop + bgParallax.offsetHeight;
         if (scrollPosition > bgParallax.offsetTop && scrollPosition <= limit) {
            bgParallax.style.backgroundPositionY = (50 - 10 * scrollPosition / limit * 3) + '%';
         } else {
            bgParallax.style.backgroundPositionY = '50%';
         }
      });
   }
</script>
</body>

</html>