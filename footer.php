
  <script type="module" src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs"></script>
  <script type="module" src="https://unpkg.com/@splinetool/viewer@1.11.9/build/spline-viewer.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const players = document.querySelectorAll('dotlottie-player[data-play-on-view]');

      const playWhenReady = (player) => {
        if (player.dataset.hasPlayed) return;
        player.dataset.hasPlayed = 'true';

        if (player.getLottie && player.getLottie()) {
          // Player is already loaded
          player.play();
        } else {
          // Wait for ready event
          player.addEventListener('ready', () => {
            player.play();
          }, { once: true });
        }
      };

      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            playWhenReady(entry.target);
            observer.unobserve(entry.target);
          }
        });
      }, {
        threshold: 0.5
      });

      players.forEach(player => {
        observer.observe(player);
      });
    });
  </script>
  <?php wp_footer(); ?>
</body>

</html>