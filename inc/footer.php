<footer id="sticky-footer" class="py-4 bg-dark text-white-50">
  <div class="container text-center">
    <small>Copyright &copy; Vinyl Designs <?php echo date("Y"); ?> </small>
  </div>
</footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
  (function() {
    if (typeof jQuery === 'undefined' || typeof jQuery.fn.carousel !== 'function') {
      return;
    }

    var intervalMs = 8000;
    var staggerMs = 1500;

    var sequence = [{
        selector: '#carouselSigns',
        delay: 0 * staggerMs
      },
      {
        selector: '#carouselShopSigns',
        delay: 1 * staggerMs
      },
      {
        selector: '#carouselWindowGraphics',
        delay: 2 * staggerMs
      },
      {
        selector: '#carouselVehicleDetailing',
        delay: 3 * staggerMs
      },
      {
        selector: '#carouselBoatNames',
        delay: 4 * staggerMs
      }
    ];

    sequence.forEach(function(item) {
      var $el = jQuery(item.selector);
      if (!$el.length) return;

      $el.carousel({
        interval: intervalMs,
        ride: false,
        pause: false,
        wrap: true
      });

      $el.carousel('pause');
      setTimeout(function() {
        $el.carousel('cycle');
      }, item.delay);
    });
  })();
</script>
<!-- AOS Script -->