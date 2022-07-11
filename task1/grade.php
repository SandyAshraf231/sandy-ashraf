<!-- <?php

// define('MAX_GRADE',400);
//       if($_POST ){
//         // $mathematics = $_POST['mathematics'];
//         $physics = $_POST['physics'];
//         $chemistry = $_POST['chemistry']; 
//         $biology = $_POST['biology'];
//         $computer = $_POST['computer'];
//          }
  
       ?> 
       -->
    
<!doctype html>
<html lang="en">
  <head>
    <title>Grades  </title>
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
            Grades   
                 </div>
            <div class="col-6 offset-3">
                <form action="" method="post">
                    <div class="form-group">
                      <label for="">Physics</label>
                      <input type="number" name="physics" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="">Chemistry</label>
                      <input type="number" name="chemistry" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="">Biology</label>
                      <input type="number" name="biology" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                   
                    <div class="form-group">
                      <label for="">Computer</label>
                      <input type="number" name="computer" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="">mathematics</label>
                      <input type="number" name="mathematics" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>

                  
                    <div class="form-group">
                        <button class="btn btn-warning btn-lg">check</button>
                    </div>

                    <div class="row">
            <div class="col-8 offset-2 ">
                <ul class="alert alert-success">
            <?php
define('MAX_GRADE',500);
if($_POST ){
  // $mathematics = $_POST['mathematics'];
  $physics = $_POST['physics'];
  $chemistry = $_POST['chemistry']; 
  $biology = $_POST['biology'];
  $computer = $_POST['computer'];
  $mathematics = $_POST['mathematics'];
  
  
            $operation = ( $physics + $chemistry + $biology + $mathematics + $computer);
            $percentage = (  $operation / MAX_GRADE ) * 100  ;
               
             echo  ' THE  percentage is  =  '.$percentage .'<br>';
           
             switch( $percentage )
           {
               case  $percentage < 40 && $percentage > 0 :
                echo ' THE Grade is = F  ';
                break;

                case  $percentage >= 40 && $percentage < 60 :
                    echo ' THE Grade is  = E  ';
                    break;
                    case  $percentage >= 60 && $percentage < 70 :
                        echo ' THE Grade is = C  ';
                        break;
                        case  $percentage >= 80  && $percentage < 90:
                            echo ' THE Grade is = B  ';
                            break;
                            case  $percentage >= 90 && $percentage < 100:
                                echo ' THE Grade is = A  ';
                                break;
                              


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