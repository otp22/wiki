<html>
<head>
<title>Wiki Template Generator</title>
</head>
<body>
<h1>OTP22 Wiki Template Generator</h1>

<form method="post" action="">
     
     <label for="location"><b>Location</b></label>
     <input name="location" id="location" /><br/>

     <label for="lat"><b>Latitude</b></label>
     <input name="lat" id="lat" /><br/>

     <label for="lon"><b>Longitude</b></label>
     <input name="lon" id="lon" /><br/>

     <label for="landmarks"><b>Landmarks</b></label>
     <input name="landmarks" id="landmarks" /><br/>
    
     <label for="items"><b>Items Found</b></label>
     <input name="items" id="items" /><br/>

     <label for="people"><b>People/Visited By</b></label>
     <input name="people" id="people" /><br/>

     <label for="date"><b>Date Found</b></label>
     <input name="date" id="date" /><br/><br/>

     <label for="type"><b>Type</b></label><br/>
     <input type="radio" name="type" value="Hardware  " />Hardware<br/> 
     <input type="radio" name="type" value="Component  " />Component <br/>
     <input type="radio" name="type" value="CD  " />CD <br/>
     <input type="radio" name="type" value="Book  " />Book <br/>
     <input type="radio" name="type" value="Other  " />Other <br/><br/>

     <label for="status"><b>Status</b></label><br/>
     <input type="radio" name="status" value="Not Visited" />Not Visited<br/>
     <input type="radio" name="status" value="Visited" />Visited<br/>
     <input type="radio" name="status" value="Unknown" />Unknown<br/> 
     <input type="radio" name="status" value="Recruited" />Recruited <br/>     
     <input type="radio" name="status" value="Partially Acquired" />Partially Acquired<br/>      
     <input type="radio" name="status" value="Acquired" />Acquired <br/>
     <input type="radio" name="status" value="Deposited" />Deposited<br/> 
     <input type="radio" name="status" value="Succeeded" />Succeeded<br/>      
     <input type="radio" name="status" value="Failed" />Failed <br/><br/>   
     

     <label for="imgur"><b>Imgur Link</b></label>
     <input name="imgur" id="imgur" /><br/>
     <br/>
     <label for="body"><b>Other Details</b></label><br/>
     <textarea rows="20" cols="60" name="body" id="body"></textarea><br/>

     <input type="submit" value="Save"/>
     </form>
     </body></html>

<?php

     if (!empty($_POST)) {

         $location = htmlspecialchars($_POST['location']);
         $lat = htmlspecialchars($_POST['lat']);
         $lon = htmlspecialchars($_POST['lon']);
         $landmarks = htmlspecialchars($_POST['landmarks']);
         $items = htmlspecialchars($_POST['items']);
         $people = htmlspecialchars($_POST['people']); 
         $type = htmlspecialchars($_POST['type']);
         $date = htmlspecialchars($_POST['date']);
         $status = htmlspecialchars($_POST['status']);
         $body = htmlspecialchars($_POST['body']);
         $imgur = htmlspecialchars($_POST['imgur']);

         echo "<code>";

         echo '{{Locbox|' . $location . ' drop |imagehere.jpg|imgur=' . $imgur 
         . '|' . $location . '|' . $lat . '|' . $lon . '|' . $landmarks . '|'
         . $items . '|' . $people . '|type=' . $type . '|status=' . $status . '|foundon=' . $date . '}}';

         echo "<br/><br/>";
         echo "'''" . $location . " drop''' was a [[" . $type . " drops/" . strtolower($type) . " drops]] found on " . $date 
         . " by " . $people . " <Br/>";
         
         echo nl2br($body) . "<br/>";

         echo "</code>";
     }
     
?>