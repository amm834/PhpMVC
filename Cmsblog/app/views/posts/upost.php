<div class="container">
  <?php flash("loginUser"); ?>
  <div class="row">
    <? foreach ($data['posts'] as $post): ?>
        <div class="col-md-12 my-3">
      <div class="card bg-primary shadow-soft border-light">
        <div class="row no-gutters align-items-center">
          <div class="col-md-4">
            <img src="<? echo URLROOT.'uploads/'.$post->imgpath; ?>" class="card-img rounded-left" alt="Artist desk">
          </div>
          
          <div class="col-md-8">
            <div class="card-body">
              <a href="#"><h3 class="h5 card-title"><? echo $post->title; ?></h3></a>
              <p class="card-text mb-4">
                <strong>
                <? $str = $post->sometext;
              $str = wordwrap($str,300);
              $str = explode("\n",$str);
              $str = $str[0].'……';
              echo $str;
                ?>
                </strong>
              </p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="card-text small"><span class="far fa-calendar-alt mr-2"></span><? $ca = $post->created_at;
                $ca = explode(" ",$ca);
                echo $ca[0];
                ?></span>
                <a href="<? echo URLROOT.'post/detail/'.$post->id; ?>" class="btn btn-sm">See More</a>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>

    <? endforeach; ?>
    
  </div>
</div>
