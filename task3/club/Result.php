<?php

$title ="result";
include_once "../layouts/header.php";

if(isset($_POST['saveValues']))
{
  $games = $_POST['games'];
  $MemberName = $_POST['MemberName'];
}


?>



<container>
    <div class="row">
        <div class="col-10 m-auto ">

            <form action="" method="POST">
                <table class="table  mt-5 ">
                    <h1 class=" text-center mt-2"> result</h1>
                    <tbody>
                        <th>subscriber</th>

                        <tr>
                            <?php
                 foreach ($MemberName as  $name){
                     ?>
                        <tr>
                            <td> <?php 
              
              echo  $name ?>
                            </td>
                            <?php
                    foreach ($games as $game  ){
                     ?>
                            <td><?php 
              
                            echo  $game ; ?>
                                <?php        } } ?></td>


                        </tr>

                    </tbody>
                </table>




                <?=


include "../layouts/scripts.php";?>

                <body>