<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>States</title>
    <style>
      body {
        padding: 0px;
        margin: 0px;
        background-color: #041923;
      }

      .top {
        padding: 0px;
        margin:  0px; 
        display: inline-block;
        width: 100%;
        text-align: center;
        border-bottom: 4px solid #FFFFFF;
      }

      .top2 {
        padding: 0px 10px;
        margin:  0px;
        font-size: 42px; 
        text-transform: uppercase;
        color: #6FEAF9;
        font-family: 'Nunito', sans-serif;
        text-align: center;
        vertical-align: bottom;
        line-height: 2.3;
      }

      .wrap {
        margin: 40px 0px 20px 0px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-image: url(images/us-map.png); 
        background-size: cover;
        background-repeat: no-repeat; 
        height: 640px;
      }

      .button {
        min-width: 300px;
        min-height: 60px;
        font-family: 'Nunito', sans-serif;
        font-size: 22px;
        text-transform: uppercase;
        letter-spacing: 1.3px;
        font-weight: 700;
        color: #6FEAF9; /* #313133; */
        background-color: #041923;
        background-size: cover;
        background-repeat: no-repeat;
        border: 2px solid #6FEAF9;
        border-radius: 1000px;
        box-shadow: 12px 12px 24px rgba(25,4,35,.64);
        transition: all 0.3s ease-in-out 0s;
        cursor: pointer;
        outline: none;
        position: relative;
        padding: 10px;
      }

      .button:hover, .button:focus {
        color: #313133;
        transform: translateY(-6px);
      }

      .contain {
        width: 100%;
        border-top: 4px solid #FFFFFF;
        display: inline-block;
        background-color: #F5E3BE;
        padding: 40px 0px 20px 0px;
      }

      table {
        width: 100%;
        text-align: center;
      }

      table tr td {
        width: 20%;
        text-align: center;
        padding-bottom: 20px;
      }

      table tr td a {
        color: #041923;
        font-family: 'Nunito', sans-serif;
        font-size: 18px;
      }

      table tr td a:hover {
        color: red;
        font-family: 'Nunito', sans-serif;
        font-size: 18px;
      }

    </style>
  </head>
  <body>
  <div class="top">
    <img src="images/usflag.png" style="width: 190px; height: 100px; float:left;">
    <span class="top2">Flags of The U.S. States and Territories</span>
    <img src="images/usflag.png" style="width: 190px; height: 100px; float:right;">  
  </div>
  <div class="wrap">
    <form action="index.php" method="GET">
      <input type="submit" name="run" value="VEIW STATES" class="button">
    </form>
  </div>
  <div class="contain">
      <table><tr>
      <?
      if(isset($_GET['run'])) {

        $state_list = array("Alabama","Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut", "Delaware",
        "Florida", "Georgia", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas", "Kentucky", "Louisiana", "Maine",
        "Maryland", "Massachusetts", "Michigan", "Minnesota", "Mississippi", "Missouri", "Montana","Nebraska","Nevada",
        "New Hampshire","New Jersey","New Mexico","New York","North Carolina","North Dakota","Ohio", "Oklahoma", "Oregon", 
        "Pennsylvania", "Rhode Island", "South Carolina", "South Dakota","Tennessee", "Texas", "Utah", "Vermont", "Virginia", 
        "Washington", "West Virginia", "Wisconsin", "Wyoming");
          
        $counter = 0;

        foreach($state_list as $state) {

        $state = preg_replace('/\s+/','_',$state);

        $myimage = "http://lesson.jaxcode.webfactional.com/stateflags/$state.svg.png";

        echo '<td><img src="' .$myimage. '"><br><a href="pages/' .strtolower($state). '.html">' .$state. '</a><br></td>'; 

        $myfile = fopen("pages/".strtolower($state).".html", "w") or die("Unable to open file!");


  $mystring = <<<EOT
  <!DOCTYPE html>
  <html>
  <head>
  <title>$state</title>
  </head>
  <body style="text-align: center;">
  <img src="$myimage"><br>
  $state <br><br>

  <iframe src="https://en.wikipedia.org/wiki/$state" width="100%" height="10000" frameborder="0"></iframe>


  </body>
  </html>
  EOT;


  fwrite($myfile, $mystring);
  fclose($myfile);

  $counter++;

    if($counter == 5) {
      echo '</tr><tr>';
      $counter = 0;
    }

    }
  }

  ?>
</tr></table>
</body>
</html>
