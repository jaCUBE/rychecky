</main>


<footer>
  <span class="tel">
    <a href="tel:<?= str_replace(' ', '', env('PHONE')) ?>"><?= env('PHONE') ?></a>
  </span>
  •
  <span class="email">
  <a href="mailto:<?= env('EMAIL') ?>"><?= env('EMAIL') ?></a>
  </span>
</footer>