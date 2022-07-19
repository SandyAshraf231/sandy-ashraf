<?php
$title ="suber market";
include_once "../layouts/header.php";

if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)){

    $user_name = $_POST['user_name'];
    $Number_of_varieties = $_POST['Number_of_varieties'];
    $city = $_POST['city'];

    $errors = [];
    if(empty($_POST['user_name'])){
        $errors['user_name'] = "<h5>* name Is Required</h5> ";
    }  if(empty($_POST['Number_of_varieties'])){
        $errors['Number_of_varieties'] = "<h5>* Number of varieties Is Required</h5> ";
    }   
$delivery = $city;

   if($city == 30)
{
    $delivery = 'giza' ;
}elseif ($city == 0)
{
    $delivery = 'cairo' ;
}
elseif ($city == 50)
{
    $delivery = 'Alex' ;
}
elseif ($city == 100)
{
    $delivery = 'Other' ;
}



 } ?>
<container>
    <div class="row">
        <div class="col-6  m-auto ">
            <form class="form" method="POST" action="">
                <h1 class="text-center">super marker</h1>
                <div class="form-group">
                    <label for="user_name">user name</label>
                    <input type="text" name="user_name" id="user_name" value="<?= $_POST['user_name'] ?? "" ?>"
                        class="form-control" placeholder="" aria-describedby="helpId">
                    <?= $errors['user_name'] ?? "" ?>

                </div>
                <div class="form-group">
                    <label for="Number_of_varieties">Number of varieties</label>
                    <input type="number" name="Number_of_varieties" id="Number_of_varieties"
                        value="<?= $_POST['Number_of_varieties'] ?? "" ?>" class="form-control" placeholder=""
                        aria-describedby="helpId">
                    <?= $errors['Number_of_varieties'] ?? "" ?>

                </div>
                <div class="form-group ">
                    <label for="city">city</label><br>
                    <select class="col py-2" name="city" id="city">
                        <option name="giza" value="30">giza</option>
                        <option name="cairo" value="0">cairo</option>
                        <option name="Alex" value="50">Alex</option>
                        <option name="Other" value="100">Other</option>
                    </select>
                </div>

                <button type="submit" value="submit" class="btn col btn-primary">enter
                    products</button>
                <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                ?>
                <form action="<?php $_PHP_SELF ?>" method="POST" >

                    <table class="table table-bordered table-sm " id="productTable">
                        <thead>
                            <tr>
                                <th>product_name</th>
                                <th>price</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
$i = "";
for($i=1; $i<= $Number_of_varieties ; $i++)
{
?>
                            <tr>
                            </tr>
                            <td><input type="text" class="form-control " name="product_name<?= $i ?>"
                                    id="product_name<?= $i ?>"></td>
                            <td><input type="text" class="form-control " name="price<?= $i ?>" id="price<?= $i ?>"></td>
                            <td><input type="text" class="form-control " name="Quantity<?= $i ?>"
                                    id="Quantity<?= $i ?>"></td>


                            </tr>

                            <?php
}
?>
                            </tr>
                        </tbody>

                    </table>

                    <button type="submit"  value="submit" class="btn col btn-primary">receipt products</button>
                </form>
                <?php } 

 //////how make condition??????? 

 if(  $_SERVER['REQUEST_METHOD'] == 'POST'  )
{

 ?>
                <table class="table  table-sm " >
                    <thead>
                        <tr>
                            <th>product_name</th>
                            <th>price</th>
                            <th>Quantity</th>
                            <th>sub total</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
$i = "";
for($i=1; $i<= $Number_of_varieties ; $i++)
{
?>
                        <tr>
                            <td><?= $_POST["product_name{$i}"] ?></td>
                            <td><?= $_POST["price{$i}"] ?></td>
                            <td><?= $_POST["Quantity{$i}"] ?></td>
                            <td> <?= $_POST["sub_total{$i}"]  = $_POST["price{$i}"] * $_POST["Quantity{$i}"] ;
?> </td>


                        </tr>
                        <?php
}
?>
                        </tr>


                        <tr>
                            <?php
for($cols=0;$cols<2;$cols++){
    

 }
 
 ?> </tr>
                        <tr>
                            <th>user name</th>
                            <td><?= $user_name ?? ""?></td>
                        </tr>
                        <tr>
                            <th>city</th>
                            <td><?= $delivery ?? ""?></td>
                        </tr>

                        <tr>
                            <th>total </th>
                            <td>
                                <?php 
       $total =0;
       for($i=1; $i<= $Number_of_varieties ; $i++)
       {
   $total +=  $_POST["sub_total{$i}"]  ;  
 } 
       echo $total ?? ""?>
                            </td>
                        </tr>
                        <tr>
                            <th>discound</th>
                            <?= $discound = "";
if($total <= 1000)
{
    $discound = $total * 0;
}elseif($total > 1000 && $total <= 3000)
{
    $discound = $total * .10;
}
elseif($total > 3000 && $total <= 4500)
{
    $discound = $total * .15;
}
elseif( $total > 4500)
{
    $discound = $total * .20;
} ?>
                            <td><?= $discound ?? ""?></td>
                        </tr>
                        <tr>
                            <th>total after discound</th>

                            <td><?=
            $total_after_discound = $total - $discound;
            $total_after_discound ?? ""?></td>
                        </tr>
                        <th>delivery</th>

                        <td><?=
 
   
     $city ?? ""?></td>
                        </tr>
                        <tr>
                            <th>net total</th>
                            <td><?=
            $net_total = $city + $total_after_discound ;
            $net_total ?? ""?></td>

                        </tr>
                        <?php


?>
                </table>

                <?php  }

include "../layouts/scripts.php";