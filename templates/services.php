<section class="services container">
  <div class="subtitle">Our Services</div>
  <h1 class="title">Creating a fun and not boring learning atmosphere</h1>
  <div class="cards">
    <?php foreach($services as $svc): ?>
      <div class="card <?= $svc['highlight'] ? 'highlight' : '' ?>">
        <div class="icon"></div>
        <div class="title"><?= htmlspecialchars($svc['title']) ?></div>
        <div class="desc"><?= htmlspecialchars($svc['desc']) ?></div>
        <a href="#" class="learn">Learn More</a>
      </div>
    <?php endforeach; ?>
  </div>
</section>
