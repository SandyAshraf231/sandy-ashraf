<?php
$title ="games";
include_once "../layouts/header.php";


if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)){

    $_SESSION["MemberName"] = $_POST['MemberName'];
    $_SESSION["Football"] = $_POST['Football'];
    $_SESSION["Swimming"] = $_POST['Swimming'];
    $_SESSION["Volley_ball"] = $_POST['Volley_ball'];
    $_SESSION["Others"] = $_POST['Others'];
    // $member_name = $_POST['member_name'];
    // $Football = $_POST['Football'];
    // $Swimming = $_POST['Swimming'];
    // $Volley_ball = $_POST['Volley_ball'];
    // $Others = $_POST['Others'];

    $MemberName = $_POST['MemberName'];
    $Football = $_POST["Football"];
    $Swimming = $_POST['Swimming'];
    $Volley_ball = $_POST['Volley_ball'];
    $Others = $_POST['Others'];

    foreach ($Football as $Football) {
        echo $Football."<br>";
    
    }
    foreach ($Swimming as $Swimming) {
      echo $Swimming."<br>";
  
  }    foreach ($Volley_ball as $Volley_ball) {
    echo $Volley_ball."<br>";

}    foreach ($Others as $Others) {
  echo $Others."<br>";

}


header('location:Result.php');


}

$_SESSION["family_member"];
// print_r($_SESSION["family_member"]);
?>

<?php for($i=1 ; $i <= $_SESSION["family_member"]; $i++)

{?>
<!-- <h1>Show Checkboxes</h1> -->

<form action="" method="post" class=" px-4 py-3 mt-2 col-6 m-auto" name="f">
    

<h1>member<?php echo $i ?> </h1>

<input type="text" name="MemberName[]" id="member_name" value="<?= $_POST['MemberName[]'] ?? "" ?>" class="form-control" placeholder="member_name">
  <input type="checkbox" id="Football" name="Football[] " value="300">
  <label for="Football "> Football (300 LE)</label><br>
  <input type="checkbox" id="Swimming" name="Swimming[]" value="250">
  <label for="Swimming"> Swimming (250 LE ) </label><br>
  <input type="checkbox" id="Volley_ball" name="Volley_ball[]" value="150">
  <label for="Volley_ball "> Volley ball (150 LE) </label><br>
  <input type="checkbox" id="Others" name="Others[]" value="100">
  <label for="Others"> Others (100 LE) </label><br><br>
  <button type="submit" value="submit" class="btn btn-primary col">result</button>

</form>

<?php } ?>










<?php
  include "../layouts/scripts.php";