<?php

$title ="result";
include_once "../layouts/header.php";

if(isset($_POST['saveValues']))
{
  $games = $_POST['games'];
  $MemberName = $_POST['MemberName'];


$table = "<table class='table '>
<thead>
    <tr>";
    $table .=  " <th>subscriber</th>";
    $table .=  " <th>";
  // print_r ($_SESSION["member_name"]);
    "</th>";

 foreach ($MemberName as  $name){


    $table .=   "<tr>";
$table .= "<th>";

    $table .= "{$name} <br>";
}

$table .= "</th>";

$table .=   "</tr>";
//  $table .= "<th>{$name}</th>";
}
$table .=    "  </tr>
</thead>
<tbody>";
foreach ($games as $game  ){
$table .=   "<tr>";
$table .= "<td>";

    $table .= "{$game} ";


}

$table .= "</td>";

$table .=   "</tr>";

$table .=    "</tbody>
</table>";
// var_dump($games).".<br>";


print_r( $games).".<br>";


// var_dump ($games[0].": In stock: ".$games[1].", sold: ".$games[2]).".<br>";
$_SESSION["Football"] = $_POST['games[]'];
$_SESSION["Swimming"] = $_POST['games[]'];
$_SESSION["Volley_ball"] = $_POST['games[]'];
$_SESSION["Others"] ;

$_SESSION["games"] ;
?>



<container>
    <div class="row">
        <div class="col-10 m-auto ">

            <form action="">
                <table class="table  mt-5 ">
                    <h1 class=" text-center mt-2"> result</h1>

                    <!-- <caption class="caption-top text-center fs-3 ">Compare plans</caption> -->

                    <thead class="thead-dark">
                        <th>Quistion</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Review</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Are you satisfied with the level of cleanliness?</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo  $_SESSION["Football"] ?></td>




                        </tr>

                        <tr>
                            <td> Are you satisfied with the service prices?</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo  $_SESSION["Swimming"] ?></td>


                        </tr>
                        <tr>
                            <td> Are you satisfied with the nursing service?</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo  $_SESSION["Volley_ball"]?></td>



                        </tr>
           
                        

                    
                    </tbody>
                </table>


  

<?=


include "../layouts/scripts.php";?>
<body>  
<?= $table ?></body>