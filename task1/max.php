
<?php
    
      
      
       ?> 

<!doctype html>
<html lang="en">
  <head>
    <title>min&max</title>
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
                min & max
            </div>
            <div class="col-6 offset-3">
                <form action="" method="post">
                    <div class="form-group">
                      <label for="">number1</label>
                      <input type="number" name="number1" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="">number2</label>
                      <input type="number" name="number2" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>  <div class="form-group">
                      <label for="">number3</label>
                      <input type="number" name="number3" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-warning btn-lg">check</button>
                    </div>

                    <div class="row">
            <div class="col-8 offset-2 ">
                <ul class="alert alert-success">
                
<?php
     
     if($_POST ){
        $number1 = $_POST['number1'];
        $number2 = $_POST['number2'];
        $number3 = $_POST['number3'];
      
         if($number1> $number2 && $number1 > $number3  )
         {
            
          echo  'max number is '.$number1 .'<br>';
        
         } 
         elseif($number1< $number2 && $number1 < $number3  )
         {
            echo  'min number is '.$number1.'<br>';

         } 
         if($number2> $number1 && $number2 > $number3 )
         {
            echo 'max number is '. $number2.'<br>';
          } 
          elseif($number2 < $number1 && $number2 < $number3 )
          {
             echo 'min number is '. $number2.'<br>';
           }
         if($number3> $number1 && $number3 > $number2)
         {
            echo  'max number is '.$number3.'<br>';
         }
    
         elseif($number3< $number1 && $number3 < $number2)
         {
            echo  'min number is '.$number3.'<br>';
         }       
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