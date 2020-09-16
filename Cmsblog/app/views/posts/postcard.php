<div class="container-fluid my-5">
  <!-- Categgory -->
  <div class="container">
    <p class="text-center">
      <span class="shadow-soft p-3  rounded"><span class="fas fa-sticky-note"></span>&nbsp;
        Post Manager
      </span>
    </p>
    <hr>
    <div class="shadow-inset p-3 rounded ">
      <? flash("createPost"); ?>
      <p class="text-center d-flex justify-content-between no-gutters">
        <a href="<?php echo URLROOT.'admin/index'; ?>" class="btn text-success">
          <span class="fas fa-home"></span>&nbsp;Home
        </a>
        <a href="<?php echo URLROOT.'category/showcat'; ?>" class="btn btn-info">
          <span class="fas fa-list"></span>&nbsp;Category
        </a>

      </p>
      <div class="rounded">
        <table class="table table-hover">
          <tr>
            <th class="border-0" scope="col" id="class3">Category Name</th>
          </tr>
          <? if (!empty($data['cats'])): ?>
          <?php foreach ($data['cats'] as $catName): ?>
          <tr>
            <td>
              <?php  echo $catName->catname; ?>
            </td>
            <td>
              <a href="<? echo URLROOT.'post/show/'.$catName->id; ?>" class="btn btn-info"><span class="fas fa-eye"></span></a>
            </td>

          </tr>
          <?php endforeach; ?>
          <?php else : ?>
          <td>
            <?php echo "<h6 class='text-center my-5'>There is no category to show!</h6>"; ?>
          </td>
          <?php endif; ?>
        </table>
      </div>

    </div>
  </div>
</div>
<div class="container">
  <a href="<? echo URLROOT.'post/create'; ?>" class="btn btn-block btn-success my-3"><span
  class="fas fa-pen"></span>&nbsp;New Post</a>
  <div class="row">
    <!-- Show Post  -->
    <?php foreach ($data['postByCatId'] as $postByCatId): ?>
    <div class="col-md-6 my-2">
      <div class="card bg-primary shadow-soft text-center border-light">
        <div class="card-header">
          <span class="card-text small"><span class="far fa-calendar-alt mr-2"></span>
            <? echo $postByCatId->created_at; ?></span>
        </div>
        <div class="card-body">
          <h3 class="h5 card-title">
<strong>
            <?
            echo $postByCatId->title;
            ?>
</strong>
            </h3>
          <p class="card-text">
<span>            <? $str = $postByCatId->sometext;
         $str = wordwrap($str,500);
         $str = explode("\n",$str);
         $str = $str[0].'……';
         echo $str;
            ?></span>
          </p>
          <p class="d-flex justify-content-center">
            <a href="<? echo URLROOT.'post/edit/'.$postByCatId->id; ?>" class="btn btn-primary mr-2"><span class="fas fa-pen text-info"></span>
            </a>
            <a href="<? echo URLROOT.'post/deletepost/'.$postByCatId->id; ?>" class="btn btn-primary mr-2"><span class="fas fa-trash text-danger"></span>
            </a>
            <a href="<? echo URLROOT.'post/detail/'.$postByCatId->id; ?>" class="btn btn-primary"><span class="fas fa-eye text-success"></span>&nbsp;Detail
            </a>
          </p>
        </div>
      </div>

    </div>

    <?php endforeach; ?>

  </div>
</div>