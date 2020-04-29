<?php
   include 'conectare.php';
?>


<html >
<head>
    <title>Bara de cautare</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<?php
    $query = $_GET['query']; 
    
    
    $min_length = 3;

    
    if(strlen($query) >= $min_length){
        
        $query = htmlspecialchars($query); 
      
        
        $query = mysql_real_escape_string($query);
        
        
        $raw_results = mysql_query("SELECT * FROM produse
            WHERE (`produs_nume` LIKE '%".$query."%') OR (`produs_categorie` LIKE '%".$query."%')") 
            
       
        
        if(mysql_num_rows($raw_results) > 0){ 
            
            while($results = mysql_fetch_array($raw_results)){
             //$results = mysql_fetch_array($raw_results) //pune datele din baza intr-un array,  pana este valid se executa bucla
            
                echo "<p><h3>".$results['produs_nume']."</h3>".$results['produs_categorie']."</p>";
                
            }
            
        }
        else{ 
            echo "Fara rezultate";
        }
        
    }
    else{ 
        echo "Lungimea minima este ".$min_length;
    }
?>
</body>
</html>
                