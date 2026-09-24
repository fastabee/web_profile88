/* HERO BANNER CAROUSEL */
(function () {
  var track = document.getElementById('carouselTrack');
  var dots = document.querySelectorAll('.carousel-dot');
  var progress = document.getElementById('carouselProgress');
  var total = 3, current = 0, autoTimer = null, progressTimer = null;
  var AUTO_DELAY = 4500;

  function goTo(index) {
    current = (index + total) % total;
    track.style.transform = 'translateX(-' + (current * 100) + '%)';
    dots.forEach(function(d, i) { d.classList.toggle('active', i === current); });
    resetProgress();
  }
  function resetProgress() {
    clearInterval(progressTimer);
    var pct = 0, step = 100 / (AUTO_DELAY / 50);
    progress.style.width = '0%';
    progressTimer = setInterval(function() {
      pct = Math.min(pct + step, 100);
      progress.style.width = pct + '%';
    }, 50);
  }
  function startAuto() {
    clearInterval(autoTimer);
    autoTimer = setInterval(function() { goTo(current + 1); }, AUTO_DELAY);
    resetProgress();
  }

  document.getElementById('carouselPrev').addEventListener('click', function() { goTo(current - 1); startAuto(); });
  document.getElementById('carouselNext').addEventListener('click', function() { goTo(current + 1); startAuto(); });
  dots.forEach(function(dot) {
    dot.addEventListener('click', function() { goTo(parseInt(dot.dataset.index)); startAuto(); });
  });

  var startX = 0, carousel = document.getElementById('heroCarousel');
  carousel.addEventListener('touchstart', function(e) { startX = e.touches[0].clientX; }, { passive: true });
  carousel.addEventListener('touchend', function(e) {
    var diff = startX - e.changedTouches[0].clientX;
    if (Math.abs(diff) > 40) { goTo(current + (diff > 0 ? 1 : -1)); startAuto(); }
  });
  carousel.addEventListener('mouseenter', function() { clearInterval(autoTimer); clearInterval(progressTimer); });
  carousel.addEventListener('mouseleave', startAuto);
  startAuto();
})();

/* PRODUK CAROUSEL */
(function () {
  var track = document.getElementById('prodTrack');
  var dotsWrap = document.getElementById('prodDots');
  var cards = track.querySelectorAll('.product-card');
  var total = cards.length;
  var visible = 3;
  var current = 0;
  var maxIndex = total - visible;
  var autoTimer = null;
  var AUTO_DELAY = 3000;

  for (var i = 0; i <= maxIndex; i++) {
    var d = document.createElement('div');
    d.className = 'prod-carousel-dot' + (i === 0 ? ' active' : '');
    d.dataset.index = i;
    dotsWrap.appendChild(d);
  }
  var dotEls = dotsWrap.querySelectorAll('.prod-carousel-dot');

  function getCardWidth() {
    return cards[0].offsetWidth + 24;
  }

  function goTo(index) {
    current = Math.max(0, Math.min(index, maxIndex));
    track.style.transform = 'translateX(-' + (current * getCardWidth()) + 'px)';
    dotEls.forEach(function(d, i) { d.classList.toggle('active', i === current); });
  }

  function startAuto() {
    clearInterval(autoTimer);
    autoTimer = setInterval(function() {
      goTo(current >= maxIndex ? 0 : current + 1);
    }, AUTO_DELAY);
  }

  document.getElementById('prodPrev').addEventListener('click', function() { goTo(current - 1); startAuto(); });
  document.getElementById('prodNext').addEventListener('click', function() { goTo(current + 1); startAuto(); });
  dotEls.forEach(function(dot) {
    dot.addEventListener('click', function() { goTo(parseInt(dot.dataset.index)); startAuto(); });
  });

  var startX = 0;
  track.addEventListener('touchstart', function(e) { startX = e.touches[0].clientX; }, { passive: true });
  track.addEventListener('touchend', function(e) {
    var diff = startX - e.changedTouches[0].clientX;
    if (Math.abs(diff) > 40) { goTo(current + (diff > 0 ? 1 : -1)); startAuto(); }
  });

  startAuto();
})();
