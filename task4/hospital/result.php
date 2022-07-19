<?php

$title ="result";
include_once "../layouts/header.php";
// 

$_SESSION["option0"];
$_SESSION["option1"]
$_SESSION["option2"];
$_SESSION["option3"];
$_SESSION["option4"];
$_SESSION["res"] ;

 define('max',50);


//  print_r($_SESSION).'<br>';

// if($_SESSION["option0"] || $_SESSION["option1"] || $_SESSION["option2"]|| $_SESSION["option3"]|| $_SESSION["option4"] == 3) 
// {
    
// $_SESSION["option0"] && $_SESSION["option1"] && $_SESSION["option2"]&& $_SESSION["option3"]|&& $_SESSION["option4"]   = 'bad';

// }
print_r($_SESSION).'<br>';

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
                            <td><?php echo  $_SESSION["option1"] ?></td>




                        </tr>

                        <tr>
                            <td> Are you satisfied with the service prices?</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo  $_SESSION["option2"] ?></td>


                        </tr>
                        <tr>
                            <td> Are you satisfied with the nursing service?</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo  $_SESSION["option3"] ?></td>



                        </tr>
                        <tr>
                            <td>Are you satisfied with the level of the doctor?</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo  $_SESSION["option0"] ?></td>

                        </tr>
                        <tr>
                            <td> Are you satisfied with the calmness in the hospital?</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo  $_SESSION["option4"] ?></td>

                        </tr>

                        <thead class="thead-dark">
                            <th>total review</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><?php echo  $_SESSION["res"] ?></th>
                            </tr>
                        </thead>
                    </tbody>
                </table>


        </div>
    </div>


    <div class="row">
        <div class="col-8 offset-2 ">
            <ul class="alert alert-danger text-center ">
                <?php
              
if ($_SESSION["res"] >= max/2){
    echo 'good thank you';
}
if ($_SESSION["res"] < max/2){
    echo 'We will call you later on your phone '. $_SESSION["num"] ;
}
?>


        </div>
        </form>
</container>





<?php
  include "../layouts/scripts.php";