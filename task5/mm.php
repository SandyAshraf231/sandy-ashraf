<?php
$title ="suber market";
include_once "../layouts/header.php";

?>


        <container>
    <div class="row">
        <div class="col-6  m-auto ">
        <form class="form" method="POST" action="<?= $_SERVER['PHP_SELF'] . '?action=getInput' ?>">
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

                <button type="submit" value="submit" class="btn col btn-primary" >enter
                    products</button>

            </form>
            <?php
            // 
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['action'] == "getInput") {
                $_SESSION['Number_of_varieties'] = isset($_POST['Number_of_varieties']) ? $_POST['Number_of_varieties'] : 0;
                $_SESSION['user_name'] = isset($_POST['user_name']) ? $_POST['user_name'] : '';
                $_SESSION['city'] = isset($_POST['city']) ? $_POST['city'] : '';
            ?>
                <form class="form" method="POST" action="<?= $_SERVER['PHP_SELF'] . '?action=getReceipt' ?>">
                    <table class="table table-light mt-5">
                        <thead class="table-primary">
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < $_POST['Number_of_varieties']; $i++) {
                            ?>
                                <tr>
                                    <td><input required class="form-control form-outline" placeholder="Enter Product Name" type="text" name="prod<?= $i ?>" id="prod<?= $i ?>"></td>
                                    <td><input required class="form-control form-outline" placeholder="Enter Product Price" type="number" name="price<?= $i ?>" id="price<?= $i ?>"></td>
                                    <td><input required class="form-control form-outline" placeholder="Enter Product Quantity" type="number" name="quan<?= $i ?>" id="quan<?= $i ?>"></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="d-grid"><button class="btn btn-primary">Reciept</button></div>
                </form>
            <?php
            } else if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['action'] == "getReceipt" ) {
            ?>
                <div class="table-responsive mt-5">
                    <table class="table table-light">
                        <thead class="table-primary">
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Sub Total</th>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < $_SESSION['Number_of_varieties']; $i++) {
                            ?>
                                <tr>
                                    <td><?= $_POST["prod{$i}"] ?></td>
                                    <td><?= $_POST["price{$i}"] ?></td>
                                    <td><?= $_POST["quan{$i}"] ?></td>
                                    <td><?= $_POST["price{$i}"] * $_POST["quan{$i}"] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <td>Client Name</td>
                                <td colspan=3><?= $_SESSION['user_name'] ?></td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td colspan=3><?= $_SESSION['city'] ?></td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td colspan=3>
                                    <?php
                                    $total = (float)0;
                                    for ($i = 0; $i < $_SESSION['Number_of_varieties']; $i++) {
                                        global $total;
                                        $total += $_POST["price{$i}"] * $_POST["quan{$i}"];
                                    }
                                    echo $total;
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Discount</td>
                                <?php
                                /* Check If Total < 1000 ,                   then discount = 0 
                                    Else if Total < 3000 AND Total >= 1000 , then discount = 10%
                                    Else if Total < 4500 AND Total >= 3000 , then discount = 15%
                                    Else if Total >= 4500 ,                  then discount = 20%
                                 */
                                $discount = 0;
                                $discountVal = 0;
                                switch ($total) {
                                    case $total >= 1000 && $total < 3000:
                                        $discount = 0.1;
                                        break;

                                    case $total >= 3000 && $total < 4500:
                                        $discount = 0.15;
                                        break;

                                    case $total >= 4500:
                                        $discount = 0.2;
                                        break;
                                    default:
                                        break;
                                }

                                if ($discount != 0) {
                                    $discountVal = $total * $discount;
                                    echo "<td colspan=3>" . $discountVal . "</td>";
                                } else {
                                    echo "<td colspan=3 class='table table-danger'>You don't have discount</td>";
                                }
                                ?>
                            </tr>
                            <tr>
                                <td>Total after Discount</td>
                                <?php
                                $totalAfterDiscount = 0;
                                if (is_numeric($discountVal) && $discountVal > 0) {
                                    $totalAfterDiscount = $total - $discountVal;
                                    echo "<td colspan=3>{$totalAfterDiscount}</td>";
                                } else {
                                    echo "<td colspan=3 class='table table-danger'>You don't have discount</td>";
                                }
                                ?>
                            </tr>
                            <tr>
                                <td>Delivery</td>
                                <?php
                                if (!empty($_SESSION['city']) && gettype($_SESSION['city'] == "string")) {
                                    $delivery = 0;
                                    switch ($_SESSION['city']) {
                                        case '/cairo/i':
                                            break;
                                        case '/giza/i':
                                            $delivery = 30;
                                            break;
                                        case '/alex/i':
                                            $delivery = 50;
                                            break;
                                        default:
                                            $delivery = 100;
                                            break;
                                    }
                                    echo "<td colspan=3> {$delivery}</td>";
                                } else {
                                    echo "<td colspan=3 class='table table-danger'>You don't have discount</td>";
                                }
                                ?>
                            </tr>
                        </tbody>
                        <tfoot class="table-primary">
                            <tr>
                                <td>Net Total</td>
                                <td colspan="3"><?php
                                    
                                    if (is_numeric($totalAfterDiscount) && $totalAfterDiscount > 0) {
                                        echo $totalAfterDiscount + $delivery;
                                    } else {
                                        echo $total + $delivery;
                                    }
                                ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            <?php
            }
            ?>
        </div>
       
    </div>
</div>

<?php



