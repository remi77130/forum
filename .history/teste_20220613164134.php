 
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <link rel="stylesheet" href="teste.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
 </head>
 <body>
     
 </body>
 </html>
 
 <div class="telephone-form-wrap">
    <h1 class="heading">Connexion</h1>

    <div class="w-form">

      <form method="post">

        <div class="input-block">
            <input type="text" class="input w-input" maxlength="256" name="Password" 
            >
        </div>

        <div class="input-block"><input type="password" class="input w-input" maxlength="256" name="Password" data-name="Password" placeholder="Password" id="Password" required="">
          <div class="eye"><img src="images/eye.jpg" alt="" class="eye_img"><img src="images/eye_close.png" alt=""></div>
        </div><input type="submit" value="Send info" data-wait="Please wait..." class="submit-button w-button">
      
    </form>
      <div class="w-form-done">
        <div>Thank you! Your submission has been received!</div>
      </div>
      <div class="w-form-fail">
        <div>Oops! Something went wrong while submitting the form.</div>
      </div>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=62a73a8defa984bd784bdc84" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
  <script>
	$(".eye").click(function(){
  $("#Password").attr("type", "text");
});
</script>