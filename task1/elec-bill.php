<?php
     
  
       ?> 
      
    
<!doctype html>
<html lang="en">
  <head>
    <title>   electricity Bill </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
        <div class="row">
            <div class="col-12 text-center text-danger h1 mt-5">     
           calculate electricity-Bill  
                 </div>
            <div class="col-6 offset-3">
                <form action="" method="post">
                    <div class="form-group">
                      <label for="">number</label>
                      <input type="number" name="number" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                  
                    <div class="form-group">
                        <button class="btn btn-warning btn-lg">calc</button>
                    </div>

                    <div class="row">
            <div class="col-8 offset-2 ">
                <ul class="alert alert-success">
            <?php
             if($_POST ){
        
              $number = $_POST['number'];
              $billBeforeVat ='';
              $billAfterVat = '';

             if ( $number <= 50)
             {
                $billBeforeVat = $number * 0.50;
             }
             elseif( $number > 50 && $number <= 150)
             {
                $billBeforeVat = $number * 0.75;
             }
             elseif( $number > 150 && $number <= 250)
             {
                $billBeforeVat = $number * 1.20;
             }
             elseif( $number > 250)
             {
                $billBeforeVat = $number * 1.50;
             }

            
             $Vat = $billBeforeVat * 0.20 ;
             $billAfterVat = $billBeforeVat + $Vat;

             echo 'bill Before Vat =  '. $billBeforeVat .'<br>';
             echo 'total price =  '. $billAfterVat ;
        
              }
            ?>    
        </ul>
        </div>
                </form>
            </div>
        </div>
      </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>