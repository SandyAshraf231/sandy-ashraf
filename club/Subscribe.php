<?php
$title ="subscribe";
include_once "../layouts/header.php";


if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)){
//   $_SESSION["num"] = $_POST['number'] ;
  $errors = [];
    if(empty($_POST['family_member'])){
        $errors['family_member'] = "<h5>* number of family_member Is Required</h5> ";

    } 
    if(empty($_POST['member_name'])){
        $errors['member_name'] = "<h5>* member_name Is Required</h5> ";

    }  
    
$_SESSION["family_member"] = $_POST['family_member'] ; 
$family_member = $_POST['family_member'] ;     
$Subscription_cost = 10000;
$Subscription_cost_member = $family_member *2500;
$initial_Subscription_value = $Subscription_cost + $Subscription_cost_member ;

$_SESSION["initial_Subscription_value"] = $initial_Subscription_value ;
// print_r($_SESSION["initial_Subscription_value"]);
// echo $initial_Subscription_value;
// print_r($_SESSION["family_member"]);
  header('location:Games.php');


}
?>
<container>
    <div class="row">
        <div class="col-6  m-auto ">
            <form class="px-4 py-3 mt-5" action="" method="post">

            <div class="form-group">
                    <label for="text" class=" h4 ">member name</label>
                    <input type="text" name="member_name" id="member_name" value="<?= $_POST['member_name'] ?? "" ?>"
                        class="form-control" placeholder="">
                        <p>Subscription cost 10000 </p>
                    <?= $errors['member_name'] ?? "" ?>

                </div>
                <div class="form-group">
                    <label for="number" class=" h4  ">count of family member</label>
                    <input type="number" name="family_member" id="family_member" value="<?= $_POST['family_member'] ?? "" ?>"
                        class="form-control" placeholder="">
                        <p>Count of each member of Family is 2500  </p>
                    <?= $errors['family_member'] ?? "" ?>

                </div>
                <button type="submit" value="submit" class="btn btn-primary">submit</button>
            </form>
        </div>
    </div>
</container>
<?php
  include "../layouts/scripts.php";