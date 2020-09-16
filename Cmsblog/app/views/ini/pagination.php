<div class="container">
<div class="row justify-content-center">
    <nav aria-label="Blog page navigation">
    <ul class="pagination">
      <?php
      $count = count($data['postcount']);
      $t = '';
      $i = '';
      for ($i = 0; $i <= $count; $i += 10) {
        $t++;
        ?>
        <li class="page-item">
          <a class="page-link" href="<? echo URLROOT.$i; ?>"><?php echo $t; ?></a>
        </li>
        <?php
      }
        ?>
      </ul>
    </nav>

</div>
  </div>
