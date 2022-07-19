<?php
$title ="login";
include_once "../layouts/header.php";


if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)){
  $_SESSION["num"] = $_POST['number'] ;
  $errors = [];
    if(empty($_POST['number'])){
        $errors['number'] = "<h5>* number Is Required</h5> ";
    }   
       if(empty($errors)){
      header('location:review.php');
}
}
?>
<container>
    <div class="row">
        <div class="col-6 text-center h4 m-auto ">
            <form class="px-4 py-3 mt-5" action="" method="post">

                <div class="form-group">
                    <label for="number">Phone Number</label>
                    <input type="number" name="number" id="number" value="<?= $_POST['number'] ?? "" ?>"
                        class="form-control" placeholder="" aria-describedby="helpId">
                    <?= $errors['number'] ?? "" ?>

                </div>
                <button type="submit" value="submit" class="btn btn-primary">submit</button>
            </form>
        </div>
    </div>
</container>
<?php
  include "../layouts/scripts.php";