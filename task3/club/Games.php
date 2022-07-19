<?php
$title ="games";
include_once "../layouts/header.php";


if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)){

    $_SESSION["MemberName"] = $_POST['MemberName'];
    $_SESSION["Football"] = $_POST['games[]'];
    $_SESSION["Swimming"] = $_POST['games[]'];
    $_SESSION["Volley_ball"] = $_POST['games[]'];
    $_SESSION["Others"] = $_POST['games[]'];
    $_SESSION["games"] = $_POST['Football'];
 

}

 $_SESSION["family_member"];
?>

<?php for($i=1 ; $i <= $_SESSION["family_member"]; $i++)

{
 
  ?>
<div class="container">

<form action="Result.php" method="post" class=" px-4 py-3 mt-2 col-6 m-auto" name="f">


<h1>member<?php echo $i ?> </h1>

<input type="text" name="MemberName[]" id="member_name" value="<?= $_POST['MemberName[]'] ?? "" ?>" class="form-control" placeholder="member_name">
  <input type="checkbox" id="Football" name="games[] " value="Football">
  <label for="Football "> Football (300 LE)</label><br>
  <input type="checkbox" id="Swimming" name="games[]" value="Swimming">
  <label for="Swimming"> Swimming (250 LE ) </label><br>
  <input type="checkbox" id="Volley_ball" name="games[]" value="Volley_ball">
  <label for="Volley_ball "> Volley ball (150 LE) </label><br>
  <input type="checkbox" id="Others" name="games[]" value="Others">
  <label for="Others"> Others (100 LE) </label><br><br>

<?php } ?>

<button type="submit" value="submit" name= "saveValues" class="btn btn-primary col">result</button>

</form>




<?php
  include "../layouts/scripts.php";