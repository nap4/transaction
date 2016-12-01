<form action="transact" method="POST">


	<?php foreach($result as $row) { ?>
     <div> <?php echo $row['id']?> : <?php echo $row['name']; ?> 
     <input type = "text" name = "" value ="<?php echo $row['balance']; ?>" size = "10"> <br>
     </div>
    <?php } ?> 

       
from:  <input type="text" value = "" name = "from_id" size="10">

to:  <input type="text" value = "" name = "to_id" size="10">
    
what:  <input type="text" value = "" name = "what" size="10">

<input type="submit" value="Send" name="send">
     
    
</form>

