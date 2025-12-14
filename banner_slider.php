
<div class="banner-slider">
  <div class="slide active">
    <img src="images/ban1.jpg" alt="Eid Offer">
    <div class="caption">🎉 Eid Special Offer — 50% Discount!</div>
  </div>
  <div class="slide">
    <img src="images/ban4.jpg" alt="New Year">
    <div class="caption">✨ Happy New Year Offer-2025</div>
  </div>
  <div class="slide">
    <img src="images/ban3.jpg" alt="Holiday Time">
    <div class="caption">🍿 Watch movie on Holiday!</div>
  </div>
</div>

<style>
.banner-slider {
  position: relative;
  max-width: 100%;
  overflow: hidden;
}
.banner-slider .slide {
  display: none;
  width: 100%;
  height: auto;
  position: relative;
}
.banner-slider .slide.active {
  display: block;
}
.banner-slider img {
  width: 100%;
  height: 500px;
  object-fit: cover;
}
.caption {
  position: absolute;
  bottom: 20px;
  left: 30px;
  background: rgba(0,0,0,0.5);
  color: #fff;
  padding: 10px;
  font-size: 18px;
}
</style>

<script>
let current = 0;
const slides = document.querySelectorAll('.banner-slider .slide');
setInterval(() => {
  slides[current].classList.remove('active');
  current = (current + 1) % slides.length;
  slides[current].classList.add('active');
}, 2000);
</script>
