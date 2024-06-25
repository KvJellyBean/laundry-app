<footer class="footer">
  <div class="section__container footer__container">
    <div class="footer__col">
      <h5><a href="#">Sarifna Laundry.</a></h5>
      <p>Discover the pinnacle of laundry care at Sarifna Laundry, where quality and convenience converge seamlessly.</p>
    </div>
    <div class="footer__col">
      <h4>Quick Links</h4>
      <div class="footer__links">
        <a href="#">Home</a>
        <a href="#about">About</a>
        <a href="#services">Services</a>
        <a href="#contact">Contact</a>
        <a href="#info">Info</a>
        <a href="#founder">Founder</a>
      </div>
    </div>
    <div class="footer__col">
      <h4>Our Services</h4>
      <div class="footer__links">
        @foreach($servicePackages as $service)
          <a href="#services">{{ $service->name }}</a>
        @endforeach
      </div>
    </div>
    <div class="footer__col">
      <h4>Help</h4>
      <div class="footer__links">
        <a>Privacy Policy</a>
        <a>Support</a>
        <a>Terms & Condition</a>
      </div>
    </div>
  </div>
  <div class="footer__bar">
    Copyright © 2024 Sarifna Laundry. All rights reserved.
  </div>
</footer>
