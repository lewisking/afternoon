
  <script>
    // Lazy load Spline and Lottie libraries on user interaction
    (function() {
      let lottieLoaded = false;
      let splineLoaded = false;

      function loadLottie() {
        if (lottieLoaded) return;
        lottieLoaded = true;
        const script = document.createElement('script');
        script.type = 'module';
        script.src = 'https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs';
        document.head.appendChild(script);
      }

      function loadSpline() {
        if (splineLoaded) return;
        splineLoaded = true;
        const script = document.createElement('script');
        script.type = 'module';
        script.src = 'https://unpkg.com/@splinetool/viewer@1.11.9/build/spline-viewer.js';
        document.head.appendChild(script);
      }

      document.addEventListener('DOMContentLoaded', function() {
        const lottieElements = document.querySelectorAll('dotlottie-player');
        const splineElements = document.querySelectorAll('spline-viewer');

        // Load libraries when elements come into view
        const lazyLoadObserver = new IntersectionObserver((entries) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              const tagName = entry.target.tagName.toLowerCase();
              if (tagName === 'dotlottie-player') {
                loadLottie();
              } else if (tagName === 'spline-viewer') {
                loadSpline();
              }
            }
          });
        }, {
          rootMargin: '200px' // Load 200px before element enters viewport
        });

        lottieElements.forEach(el => lazyLoadObserver.observe(el));
        splineElements.forEach(el => lazyLoadObserver.observe(el));

        // Also load on first user interaction (scroll, touch, click)
        const loadOnInteraction = () => {
          if (lottieElements.length > 0) loadLottie();
          if (splineElements.length > 0) loadSpline();
          window.removeEventListener('scroll', loadOnInteraction);
          window.removeEventListener('touchstart', loadOnInteraction);
          window.removeEventListener('click', loadOnInteraction);
        };

        window.addEventListener('scroll', loadOnInteraction, { passive: true, once: true });
        window.addEventListener('touchstart', loadOnInteraction, { passive: true, once: true });
        window.addEventListener('click', loadOnInteraction, { once: true });

        // Handle play-on-view for Lottie players
        const playersWithTrigger = document.querySelectorAll('dotlottie-player[data-play-on-view]');

        const playWhenReady = (player) => {
          if (player.dataset.hasPlayed) return;
          player.dataset.hasPlayed = 'true';

          if (player.getLottie && player.getLottie()) {
            player.play();
          } else {
            player.addEventListener('ready', () => {
              player.play();
            }, { once: true });
          }
        };

        const playObserver = new IntersectionObserver((entries) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              playWhenReady(entry.target);
              playObserver.unobserve(entry.target);
            }
          });
        }, {
          threshold: 0.5
        });

        playersWithTrigger.forEach(player => {
          playObserver.observe(player);
        });

        // Lazy load videos
        const lazyVideos = document.querySelectorAll('video[data-lazy-video]');

        const videoObserver = new IntersectionObserver((entries) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              const video = entry.target;
              const source = video.querySelector('source[data-src]');

              if (source && source.dataset.src) {
                source.src = source.dataset.src;
                source.removeAttribute('data-src');
                video.load();

                // Play when loaded
                video.addEventListener('loadeddata', () => {
                  video.play().catch(() => {
                    // Autoplay prevented, ignore
                  });
                }, { once: true });
              }

              videoObserver.unobserve(video);
            }
          });
        }, {
          rootMargin: '100px' // Load 100px before entering viewport
        });

        lazyVideos.forEach(video => {
          videoObserver.observe(video);
        });
      });
    })();
  </script>
  <?php wp_footer(); ?>
</body>

</html>