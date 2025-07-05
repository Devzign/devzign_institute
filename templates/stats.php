<section class="stats">
  <div class="container">
    <?php foreach($stats as $s): ?>
      <div class="stat">
        <div class="number"><?= htmlspecialchars($s['number']) ?></div>
        <div class="label"><?= htmlspecialchars($s['label']) ?></div>
      </div>
    <?php endforeach; ?>
  </div>
</section>
