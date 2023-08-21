<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SearchCityData</title>
</head>

<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

*{
    margin: 0;
    font-family: 'Poppins', sans-serif;
    padding: 0;
    box-sizing: border-box;
}
#heading{
    text-align: center;
    padding-top: 25px;
    text-decoration: underline;
}
#container{
    background-color: #75C2F6;
    
}
h1{
    margin-bottom: 25px;

}

#info {
    
    margin-left: 40px;
    width: 100%;
    height: 100%;   
    margin-top: 20px;
    display: flex;
    flex-wrap: wrap;
          
}
#Sunday, #Monday, #Tuesday, #Wednesday, #Thursday, #Friday, #Saturday{

    margin-top: 20px;
    width: 15%;
    height: 625px;
    padding: 35px 42px;
    border: 2px solid black;
    text-align: center;
    margin-bottom: 7px;
    background-color: #a0d2f4;
    margin-left: 10px;
    margin-right: 10px;
    border: none;
    border-radius: 5px        
}
h2, h3{
    padding-bottom: 20px
}
button{
    padding: 10px 20px;
    background-color: green;
    color: white;
    border: none;
    box-shadow: 0 0 6px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    border-radius: 5px;
    font-weight: 600;
    
     
}
button:hover{
    background-color: hsl(120, 66%, 16%);
    border: 3px solid white;

}

#searchbtn{
    text-align: center;
    

}
#center-button{
    text-align: center;
    margin-top: 10px;
    padding-bottom: 30px;
}
#search{
   
    width: 20%;
    margin: 10px 0;
    padding: 10px 20px;
    border: none;
    box-shadow: 0 0 6px rgba(0, 0, 0, 0.2);
    border-radius: 5px;
    
}
#btn{
              
    width: 100px;
    padding: 10px 20px;
    margin-left: 6px;
    font-weight: 600;
    background-color: green;
    color: white;
    border: none;
    box-shadow: 0 0 6px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    border-radius: 5px;
} 
#btn:hover{

    background-color: rgb(49, 61, 15);
    color: white;

}

</style>
<body>

<?php

$servername = "localhost";
$database = "Sevendays_Weather";
$username = "root";
$password = "";
$port = 3307;

$conn = mysqli_connect($servername, $username, $password, $database, $port);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputCity = $_POST["city"];
    $api_url = "https://api.openweathermap.org/data/2.5/weather?q=${inputCity}&units=metric&appid=e02d1cd9b32f99953630a3142806d7e4";
    $response = file_get_contents($api_url);
    $data = json_decode($response, true);
    
    $weatherIcon = $data["weather"][0]["icon"];
    $Temp = $data["main"]["temp"];
    $Description = $data["weather"][0]["description"];
    $Humidity = $data["main"]["humidity"];
    $Pressure = $data["main"]["pressure"];
    $wind_speed = $data["wind"]["speed"];

    echo "<div id='currentweather'>";  

    echo "<h1 id='heading'>$inputCity Weather Data</h1>";
    
    echo "<div id='display'>";

    echo "<h1>Today's Weather data</h1>";  
    echo "<img src = 'https://openweathermap.org/img/wn/$weatherIcon@2x.png' >";  
    echo "<h2>Temperature: $Temp °C</h2>";  
    echo "<h3>Humidity: $Humidity %</h3>";  
    echo "<h3>Pressure: $Pressure hPa</h3>";  
    echo "<h3>Wind Speed: $wind_speed km/H</h3>";  
    echo "<h2>Weather Description: $Description</h2>";
      
    
    echo "<div id='center-btn'>"; 
    echo "<a href='index.html'><button>Go Back ⇦</button></a>";
    echo "</div>"; 

    echo "</div>";

    echo "</div>";
  

}

?>
    
</body>
</html>