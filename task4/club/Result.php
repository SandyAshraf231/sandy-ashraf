<?php

$title ="result";
include_once "../layouts/header.php";
// 

// $_SESSION["MemberName"];
// $_SESSION["Football"];
// $_SESSION["Swimming"];
// $_SESSION["Volley_ball"];
// $_SESSION["Others"] ;
// $_SESSION["family_member"];
// print_r($_SESSION['MemberName'] );

if(isset($_POST['saveValues']))
{
  $games = $_POST['games'];
  $MemberName = $_POST['MemberName'];
  // foreach ($MemberName as  $name)
  // {
  //   echo     $name.'<br>';
  // }  
  // foreach ($games as $game  )

  // {
  //   echo     $name.' =>> '. $game.'<br>';
  // }

  // foreach ($games as $game)
  // {
  //   echo   $game.'<br>';

  // }
  }
?>


  <div class="container">
    <div class="row">
        <div class="col-12 text-center h1 text-dark mt-5">
            Products 
        </div>
        <?php   foreach ($MemberName as  $name) { ?>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?= $name ?></h4>
                    </div>
                    <div class="card-footer text-muted">
                        <p class="card-text">
                            <?php   foreach ($games as $game  ){ 
                                echo $game .' EGP <br>';
                            } ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>









<?php

//  $_SESSION["member_name"];


$table = "<table class='table '>
<thead>
    <tr>";
    $table .=  " <th>subscriber</th>";
    $table .=  " <th>";
  // print_r ($_SESSION["member_name"]);
    "</th>";

 foreach ($MemberName as  $name){
$table .= "<th>{$name}</th>";
}
$table .=    "  </tr>
</thead>
<tbody>";
foreach ($games as $game  ){
$table .=   "<tr>";
$table .= "<td>";

    $table .= "{$game} <br>";
}

$table .= "</td>";

$table .=   "</tr>";

$table .=    "</tbody>
</table>";
  include "../layouts/scripts.php";

  ?>
  <body>  
    <?= $table ?></body>