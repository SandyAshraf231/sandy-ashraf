<?php

$title ="raview";
include_once "../layouts/header.php";




if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)){

    $_SESSION["option0"] = $_POST['option0'];
    $_SESSION["option1"] = $_POST['option1'];
    $_SESSION["option2"] = $_POST['option2'];
    $_SESSION["option3"] = $_POST['option3'];
    $_SESSION["option4"] = $_POST['option4'];

    define('max',50);
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option0 = $_POST['option0'];
    $option4 = $_POST['option4'];

    $result = ($option0 + $option1 + $option2 + $option3 +  $option4 );
    $_SESSION["res"]  = $result;

 header('location:result.php');



}

?>

<container>
    <!-- <div class="row"> -->
    <div class="col-10 m-auto ">
        <form action="" method="post">
            <table class="table  mt-5 ">
                <h1 class=" text-center mt-2"> review</h1>
                <thead class="thead-dark">
                    <tr>
                        <th>Quistion</th>
                        <th></th>
                        <th></th>
                        <th name="bad" value='0'>bad</th>
                        <th name="good" value='3'> good</th>
                        <th name="very_good" value="5">very good</th>
                        <th name="Exellent" value="10">Exellent</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                        <td>Are you satisfied with the level of the doctor?</td>
                        <td></td>
                        <td></td>
                        <td><input type="radio" id="" name="option0" value="0"></td>
                        <td><input type="radio" id="" name="option0" value="3"></td>
                        <td><input type="radio" id="" name="option0" value="5"></td>
                        <td><input type="radio" id="" name="option0" value="10"></td>



                    </tr>
                    <tr>
                        <td>Are you satisfied with the level of cleanliness?</td>
                        <td></td>
                        <td></td>
                        <td><input type="radio" id="" name="option1" value="0"></td>
                        <td><input type="radio" id="" name="option1" value="3"></td>
                        <td><input type="radio" id="" name="option1" value="5"></td>
                        <td><input type="radio" id="" name="option1" value="10"></td>



                    </tr>

                    <tr>
                        <td> Are you satisfied with the service prices?</td>
                        <td></td>
                        <td></td>
                        <td><input type="radio" id="" name="option2" value="0"></td>
                        <td><input type="radio" id="" name="option2" value="3"></td>
                        <td><input type="radio" id="" name="option2" value="5"></td>
                        <td><input type="radio" id="" name="option2" value="10"></td>


                    </tr>
                    <tr>
                        <td> Are you satisfied with the nursing service?</td>
                        <td></td>
                        <td></td>
                        <td><input type="radio" id="" name="option3" value="0"></td>
                        <td><input type="radio" id="" name="option3" value="3"></td>
                        <td><input type="radio" id="" name="option3" value="5"></td>
                        <td><input type="radio" id="" name="option3" value="10"></td>


                    </tr>
                   
                    <tr>
                        <td> Are you satisfied with the calmness in the hospital?</td>
                        <td></td>
                        <td></td>
                        <td><input type="radio" id="" name="option4" value="0"></td>
                        <td><input type="radio" id="" name="option4" value="3"></td>
                        <td><input type="radio" id="" name="option4" value="5"></td>
                        <td><input type="radio" id="" name="option4" value="10"></td>

                    </tr>
                    <tr>



                </tbody>
            </table>

            <button type="submit" value="submit" class="btn btn-primary col">result</button>


    </div>
    </form>
</container>





<?php
  include "../layouts/scripts.php";