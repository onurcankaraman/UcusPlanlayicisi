<?php
if(isset($_POST['ucusbul']))
{
    $dep = $_POST['toIcao'];
    $arr = $_POST['desIcao'];

    $ucusRaporu = file_get_contents("https://api.flightplandatabase.com/search/plans?fromICAO=".$dep."&toICAO=".$arr."&limit=2");
    // echo $ucusRaporu;
    
    $rotalar = json_decode($ucusRaporu,true);    
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta
      name="author"
      content="Mark Otto, Jacob Thornton, and Bootstrap contributors"
    />
    <meta name="generator" content="Jekyll v4.1.1" />
    <title>Signin Template · Bootstrap</title>

    <link
      rel="canonical"
      href="https://getbootstrap.com/docs/4.5/examples/sign-in/"
    />

    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->

    <style>
        #resim{
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none;
          padding-top: 10px;
        }
  
        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }
      </style>
  </head>
</head>
<body>
    <center>
    <img id="resim"
        class="mb-5"
        src="assets/brand/bootstrap-solid.svg"
        alt=""
        width="150"
        height="150"
      />
    </center>
    <table class="table table-hover">
        <thead>
          <tr align='center' >
            <th scope="col" >Rota ID</th>
            <th scope="col" >Kalkış ICAO</th>
            <th scope="col" >İniş ICAO</th>
            <th scope="col" >Uzaklık</th>
            <th scope="col" >Uçuş İrtifası</th>
            <th scope="col" >Popülerlik</th>
            <th scope="col" >İşlemler</th>
          </tr>
        </thead>
        <tbody>
          <?php
              foreach ($rotalar as $sira)
              {
                  if($sira['maxAltitude'] <> 0){
                    echo "<tr align='center'>
                    <td scope='row'align='center'>".$sira['id']."</th>
                    <td>".$sira['fromICAO']."</td>
                    <td>".$sira['toICAO']."</td>
                    <td>".round($sira['distance'])." NM</td>
                    <td>".$sira['maxAltitude']." FT</td>
                    <td>".$sira['popularity']."</td>,
                    <td><button type='button' name=".$sira['id']." class='btn btn-info'>Detayları Gör</button></td>";
                  }
              }
          ?>
        </tbody>
      </table>
</body>
</html>