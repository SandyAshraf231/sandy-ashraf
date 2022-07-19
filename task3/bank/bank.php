<?php
$title ="bank";
include_once "../layouts/header.php";


if($_SERVER['REQUEST_METHOD'] == "POST" ){

    $user_name = $_POST['user_name'];
    $loan_amount = $_POST['loan_amount'];
    $loan_year = $_POST['loan_year'];

  $errors = [];
    if(empty($_POST['user_name'])){
        $errors['user_name'] = "<h5>* name Is Required</h5> ";
    }  if(empty($_POST['loan_amount'])){
        $errors['loan_amount'] = "<h5>* loan_amount Is Required</h5> ";
    }   
    if(empty($_POST['loan_year'])){
        $errors['loan_year'] = "<h5>* loan_year Is Required</h5> ";
    }   
  
$interest_rate = '';
if ($loan_year <= 3)
{
    $interest_rate = $loan_amount*$loan_year*0.10 ;
}
if ($loan_year > 3)
{
    $interest_rate = $loan_amount*$loan_year*0.15;
}
 $loan_after_rate= $interest_rate + $loan_amount ;

$month = $loan_year * 12;
$monthly = $loan_after_rate / $month;




}?>
<container>
    <div class="row">
        <div class="col-6  m-auto ">
            <form class="px-4 py-3 mt-5" action="" method="post">

                <div class="form-group">
                    <label for="user_name">user name</label>
                    <input type="text" name="user_name" id="user_name" value="<?= $_POST['user_name'] ?? "" ?>"
                        class="form-control" placeholder="" aria-describedby="helpId">
                    <?= $errors['user_name'] ?? "" ?>

                </div>
                <div class="form-group">
                    <label for="loan_amount">loan amount</label>
                    <input type="number" name="loan_amount" id="loan_amount" value="<?= $_POST['loan_amount'] ?? "" ?>"
                        class="form-control" placeholder="" aria-describedby="helpId">
                    <?= $errors['loan_amount'] ?? "" ?>

                </div>
                <div class="form-group">
                    <label for="loan_year">loan_year</label>
                    <input type="number" name="loan_year" id="loan_year" value="<?= $_POST['loan_year'] ?? "" ?>"
                        class="form-control" placeholder="" aria-describedby="helpId">
                    <?= $errors['loan_year'] ?? "" ?>

                </div>
                <button type="submit" value="submit" class="btn btn-primary">calculate</button>

            </form>

            <table class="table  mt-5 ">
                <thead class="thead-dark">
                    <th>user name</th>
                    <th>interest rate</th>
                    <th>loan after rate</th>
                    <th>monthly</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $user_name ?? ""?></td>
                        <td><?= $interest_rate ?? ""?></td>
                        <td><?= $loan_after_rate ?? ""?></td>
                        <td><?= $monthly ?? ""?></td>
                    </tr>

                    </thead>
                </tbody>
            </table>

        </div>
    </div>
</container>
<?php
  include "../layouts/scripts.php";