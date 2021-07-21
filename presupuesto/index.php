<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>


<div class="container">
    
      <div class="card" style="margin: 10% auto; width:40%">
            <h2 class="text-center py-3">Inicio de sesion</h2>
            <div class="card-body">
               <form method="POST" action="login.php">
               <div class = "form-group">
               <label for="exampleInputEmail1">Correo electronico</label>
               <input type="email"  name="correo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
               </div>
               <div class="form-group">
               <label for="exampleInputPassword1">Password</label>
               <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
               </div>
           
               <button type="submit" style="width: 100%;" class="btn btn-primary">Iniciar sesion</button>
               </form>
    
            </div>
        </div>
</div>

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>