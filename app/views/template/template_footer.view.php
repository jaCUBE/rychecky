</main>


<footer>
  <span class="tel">
    <a href="tel:<?= str_replace(' ', '', getenv('PHONE')) ?>"><?= getenv('PHONE') ?></a>
  </span>
  •
  <span class="email">
  <a href="mailto:<?= getenv('EMAIL') ?>"><?= getenv('EMAIL') ?></a>
  </span>
</footer>