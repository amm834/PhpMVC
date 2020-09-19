<?php
class Category extends Controller {
  function __construct() {
    $this->catModel = $this->model("CategoryModel");
  }
  function home($data = []) {
    $data = [
      "name" => '',
      "cats" => ''
    ];
    $data['cats'] = $this->catModel->getAllCatData();
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data['name'] = $_POST['catname'];
      if (!empty($data['name'])) {
        $catResult = $this->catModel->insertCat($data['name']);

        if ($catResult) {
          $data['cats'] = $this->catModel->getAllCatData();
          flash('cat_success', 'Cat Created Successful');
          $this->view("admin/category/catSidebar", $data);
        }
      } else {
        flash("cat_failed", "Cat Create Fail");
        $this->view("admin/category/catSidebar", $data);
      }

    } else {
      $this->view("admin/category/catSidebar", $data);
    }
  }

  function edit($data = []) {
    $dta = [
      'curCat' => '',
      'cats' => '',
      'name' => ''
    ];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $catId = getCatId();
      $dta['name'] = $_POST['catName'];
      $dta['cats'] = $this->catModel->getAllCatData();

      if ($this->catModel->renameCatById($dta['name'] = $_POST['catname'], getCatId())) {
        deleteCatId();
      }
      redirect(URLROOT."category/edit");

      if ($this->view("admin/category/edit", $dta)) {
        deleteCatId();
      }

    } else {
      setCatId($data[0]);
      $dta['cats'] = $this->catModel->getAllCatData();
      $dta['curCat'] = $this->catModel->getCatNameById($data[0]);
      $this->view("admin/category/edit", $dta);
    }
  }

  function delete($data = []) {
    if ($this->catModel->deleteCat($data[0])) {
      redirect(URLROOT."category/home");
    }else{
       redirect(URLROOT."category/home");
    }
  }
}



?>