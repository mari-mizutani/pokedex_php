<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

    <title>Pokedex</title>
</head>
<body>
<div class="p-5">
<form action="" method="GET">
    <input type="text" name="name" placeholder="Name or ID here..."/>
    <button type="submit" class="btn btn-dark">SUBMIT</button>
    <div class="main-body mx-auto p-lg-5 p-sm-3 my-5">   
        <div class="main p-4 m-4 mx-auto">   
        <?php
        if(!empty($_GET['name'])){
            $pokeApiUrl = "https://pokeapi.co/api/v2/pokemon/" . urlencode($_GET['name']);
            $pokeJson = file_get_contents($pokeApiUrl);
            $pokeResult = json_decode($pokeJson, true);
            // name
            $pokeName = $pokeResult['name'];
            echo "<h2>$pokeName</h2>";

            //id
            $pokeId = $pokeResult['id'];
            echo "<h3>" ."#". $pokeId. "</h3>";

            // picture
            $pokeImage = "https://pokeres.bastionbot.org/images/pokemon/" .$pokeId .".png";
            // $pokeImage = $pokeResult ['sprites']['front_default'];
            echo "<img src= '$pokeImage' />";

            //moves
            $pokeMove = $pokeResult ['moves'];
            for($i=0; $i<4; $i++){
            echo "<br>".$pokeMove[$i]['move']['name'];
            }
        
            //evolution
            $pokeEvolution = "https://pokeapi.co/api/v2/pokemon-species/" . $pokeId;
            $pokeEvJson = file_get_contents($pokeEvolution);
            $pokeEvResult = json_decode($pokeEvJson, true);
            $pokeEvName = $pokeEvResult['evolves_from_species'];

            if($pokeEvName == null){
            echo "<h4>"."No previous evolution"."</h4>";
            }
            else{  
            echo "<h5>"."Previous evolution is ".$pokeEvName['name']."</h5>"; 
            }  

        }  
        ?>
        </div>
    </div> 
</form>
</div>    
</body>
</html>

