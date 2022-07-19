<?php
$title ="suber market";
include_once "../layouts/header.php";

if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)){

    $user_name = $_POST['user_name'];
    $Number_of_varieties = $_POST['Number_of_varieties'];
    $city = $_POST['city'];
    $product_name = $_POST['product_name'] ;
    $price = $_POST['price'];
    $Quantity = $_POST['Quantity'];

    // foreach ($product_name as $product_namev) {
    //     echo $product_namev, "\n";
    // }
    // foreach ($price as $pricev) {
    //     echo $pricev, "\n";
    // }

    // foreach ($Quantity as $Quantityv) {
    //     echo $Quantityv, "\n";
    // }


$sub_total = $pricev * $Quantityv;
$total = $sub_total *  $Number_of_varieties;
$discound = "";
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
}
$total_after_discound = $total - $discound;
$delivery = $city;
$net_total = $delivery +  $total_after_discound ;

  $errors = [];
    if(empty($_POST['user_name'])){
        $errors['user_name'] = "<h5>* name Is Required</h5> ";
    }  if(empty($_POST['Number_of_varieties'])){
        $errors['Number_of_varieties'] = "<h5>* Number of varieties Is Required</h5> ";
    }   

if($city == 30)
{
    $city = 'giza' ;
}elseif ($city == 0)
{
    $city = 'cairo' ;
}
elseif ($city == 50)
{
    $city = 'Alex' ;
}
elseif ($city == 100)
{
    $city = 'Other' ;
}
print_r($city);
}
?>
<container>
    <div class="row">
        <div class="col-6  m-auto ">
            <form class="px-4 py-3 mt-5" action="" method="post" name="productTable">
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

                <button type="submit" value="submit" class="btn col btn-primary">enter products</button>


                
                <?php
 if(!empty($_POST)){
// $product_name = $_POST['product_name'];
// $price = $_POST['price'];
// $Quantity = $_POST['Quantity'];
// print_r( 'product_name : '.$product_name).'<br>';


?>
                <table class="table table-bordered table-sm " id="productTable" name="productTable" method="get">
                    <thead>
                        <tr>
                            <th>product_name</th>
                            <th>price</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tboby>
                    <?php

for($i=1; $i<= $Number_of_varieties ; $i++)
{

    echo "<tr>";
    // for ($j=1;$j<=3;$j++)
    //   {
    
      
      echo "<td>" ?>.
     <input type="text" name="product_name[]" id="product_name" value="<?= $_POST['product_name[]'] ?? "" ?>" class="form-control" placeholder="enter product_name">
      .<?="</td>";
        echo "<td>" ?>.
        <input type="number" name="price[]" id="price" value="<?= $_POST['price[]'] ?? "" ?>" class="form-control" placeholder="enter price">
         .<?="</td>";
           echo "<td>" ?>.
           <input type="number" name="Quantity[]" id="Quantity" value="<?= $_POST['Quantity[]'] ?? "" ?>" class="form-control" placeholder="enter Quantity">
            .<?="</td>";
      }
      echo "</tr>";










?>
         
                        <?php
}
?>
                    </tboby>
<?php print_r($_POST);?>
                </table>
                <button type="submit" value="submit" class="btn col btn-primary" >receipt </button>
              
    
<!-- /////////////////////////////////////////////////////////// -->
<?php  
if(!empty($_POST)){


?>


<table class="table  table-sm " id="receiptTable" >
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

for($i=1; $i<= $Number_of_varieties ; $i++)


{
?>
        <tr>
     
  <?php  
 foreach ($product_name as $row => $product_name) {
  
   ?> 
 
 <?=
  $product_name.="<td>" ;
  $product_name.="</td>" ;
 } ?>
<td>

<?php  
 foreach ($price as $row=> $price) {
   ?> 
<td>  
 <?= 
  $price.="<td>" ; 
  $price.="</td>" ;
   } ?></td>



 <td>

 <?php  
 foreach ($Quantity  as $row=> $Quantity) {
  
   ?> 
 
 <?=
  $Quantity.="<td>" ;
  $Quantity.="</td>" ;
 } ?>
<td>



        </tr>
        <?php
}
?>
        </tr>


        <tr>
        <?php
for($cols=0;$cols<2;$cols++){

 }?> </tr>
    <tr>
        <th>user name</th>
        <td><?= $user_name ?? ""?></td>
    </tr>
    <tr>
        <th>city</th>
        <td><?= $city ?? ""?></td>
    </tr>
    <tr>
        <th>total </th>
        <td><?= $total ?? ""?></td>
    </tr>
    <tr>
        <th>discound</th>
        <td><?= $discound ?? ""?></td>
    </tr>
    <tr>
        <th>total after discound</th>
        <td><?= $total_after_discound ?? ""?></td>
    </tr>
    <th>delivery</th>
    <td><?= $delivery ?? ""?></td>
    </tr>
    <tr>
        <th>net total</th>
        <td><?= $net_total ?? ""?></td>

    </tr>
    <?php


?>
</table>



<?php
}
?>
              </form>
        </div>
    </div>
</container>    

                

//                 <?php
// foreach ($price as $pricev) {
//     // echo $pricev, "\n";
// } $pricev?></td>
<!-- //             <td> 


                
<?php 
// foreach ($Quantity as $Quantityv) {
//     // echo $Quantityv, "\n";
   
//           } $Quantityv ?></td>
           
           
           <td><?= $sub_total?></td> -->

           <html>
<body>
<table class="table table-bordered " >
<thead>
                        <tr>
                            <th>product_name</th>
                            <th>price</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
<?php
for($i=1;$i<= $Number_of_varieties;$i++)
{
echo "<tr>";
// for ($j=1;$j<=3;$j++)
//   {

  
  echo "<td>" ?>
 <input type="text" name="product_name[]" id="product_name" value="<?= $_POST['product_name[]'] ?? "" ?>" class="form-control" placeholder="enter product_name">
  <?="</td>";
    echo "<td>" ?>
    <input type="number" name="price[]" id="price" value="<?= $_POST['price[]'] ?? "" ?>" class="form-control" placeholder="enter price">
     <?="</td>";
       echo "<td>" ?>
       <input type="number" name="Quantity[]" id="Quantity" value="<?= $_POST['Quantity[]'] ?? "" ?>" class="form-control" placeholder="enter Quantity">
        <?="</td>";
  }
  echo "</tr>";
//   }


 ?>

</table>

<?php 
 
 

print_r($_POST);?>

</body>
</html>

<?php

                include "../layouts/scripts.php";



    