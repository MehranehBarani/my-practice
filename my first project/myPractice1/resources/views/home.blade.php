<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet"> -->
</head>
<body>
    <div class="message">
    </div>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
    @endif
        </div>

    <div class="overlay" id="overlay">
        <h3>Serching now...</h3>
    </div>
    <div class="hero-bg">
        <section class="top">
            <header>
                <a href="#">yummy.eats</a>
            </header>

            <h1><span>The Healthy</span> Eating Experience</h1>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore ad explicabo dolor voluptatum d</p>
        
            <div class="form-container">
                <form  method="POST" action={{route('getData')}} id="search-form">
                    @csrf
                    <div class="form-left">
                        <label for="city">Enter your city</label>
                        <input type="text" name="city" id="city">
                        <p>Example: "San Diego"</p>
                    </div>
                    
                    <button type="sumbit" value="find food Now" id="cta-btn">
                </form>
            </div>

        </section>
    </div>

    <section class="authentic">
        <div class="right-col">
            <h2>authentic. Awsome.</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero excepturi dolores aperiam voluptate quasi, cupiditate autem in blanditiis fuga nam!</p>
        </div>
        <img id="food-img" src="images/food.jpg" alt="picture of food">
        <button type="button" id="test" class="btn btn-primary" data-id="1">1</button>
        <button type="button" id="test" class="btn btn-primary" data-id="2">2</button>
        <button type="button" id="test" class="btn btn-primary" data-id="3">3</button>
        <div class="1" id="1" style="background: yellow; width: 50px; height: 50px display: block;" ></div>
        <div class="2" id="2" style="background: blue; width: 50px; height: 50px; display: block;" ></div>
        <div class="3" id="3" style="background: red; width: 50px; height: 50px; display: block;"></div>
    </section>

    
</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/reqres.js"></script> 
    <script>
        let btn = document.getElementById("cta-btn");
        let overlay = document.getElementById("overlay");
        
        function modifyOverlay(){
            // overlay.style.display = "grid";
            overlay.classList.add("animate-overaly");
        }
        btn.addEventListener("click" ,  modifyOverlay );

        
    </script>
    
    <script>
        $( function() {
            $('.btn').on('click' , function(){
                var id = $(this).attr('data-id');
                $('#'+id).toggle();
            });
        });

        
    </script>



    
    <!-- <html>
    <body>
    
    <p>This example demonstrates how to pass parameter values when using the 
    addEventListener() method.</p>
    
    <p>Click anywhere in the document to perform a calculation.</p>
    
    <p id="demo"></p>
    
    <script>
    var p1 = 5;
    var p2 = 7;
    
    document.addEventListener("click", function() {
      myFunction(p1, p2);
    });
    
    function myFunction(a, b) {
      var result = a * b;
      document.getElementById("demo").innerHTML = result;
    }
    </script>
    
/////////////////////////////
 <div class="alert alert-danger alert-dismissible fade show"  role="alert">
           <p>not found! :(</p> 
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="alert alert-success alert-dismissible fade show"  role="alert">
           <p>not found! :(</p> 
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
////////////////////////////
    </body>
    </html>    -->