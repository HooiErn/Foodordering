<!DOCTYPE html>
<style>
.button {
    border: none;
    color: white;
    padding: 8px 18px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
  }
  
  .button {
    background-color: white; 
    color: black; 
    border: 1px solid #000000;
  }
  
  .button:hover {
    background-color: #000000;
    color: white;
  }
  </style>
<html>
    <head>
        <title>Touch 'n Go QrCode</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Fonts -->
        <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet">
        <!-- Css -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    </head>
    <body>
        <br><br><br>
       <center> <h3>Touch 'n Go QrCode:</h3> </center>
        <div class="top">
            <div class="d-flex justify-content-center align-items-center">
               <a href="/images/SSA.png" download>
  <img src="/images/SSA.png" alt="W3Schools" width="104" height="142">
</a>
            </div>
        </div>
        <div class="bottom">
            <div class="d-flex justify-content-center align-items-center text-align-center">
                <a href="#" class="btn border-0" id="touch"><button class="button">Download it</button></a>
            </div>
        </div>
        <script src="js/FileSaver.min.js"></script>
    <script src="js/script.js"></script>
    </body>
</html>
