<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$db='local_champion';
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>

<div class='pinakas'>
			<?php
				//Επιλογή ΒΔ
				$conn = new mysqli($servername, $username, $password, $db);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                  }
                  echo "Connected successfully";
                  ?>
            
</div>
<div class='pinakas'>
			<?php
				//Επιλογή ΒΔ
                $conn = new mysqli($servername, $username, $password, $db);				
				//Εισαγωγή των υποερωτήσεων (queries)
				$sql="select παίκτης.Όνομα,παίκτης.Επώνυμο
                from Παίκτης, έχει, Ομάδα
                where Ομάδα.Όνομα = 'Κεραυνός' and  Ομάδα.id_ομάδας = έχει.id_ομάδας and Παίκτης.ΑΜΚΑ = έχει.ΑΜΚΑ_παίκτη;";
				
				
				//Παίρνω τα δεδομένα από τη Βάση Δεδομένων
				$result=mysqli_query($conn,$sql);
		
		
				//Έλεγχος για το μέγεθος του πίνακα
				if (mysqli_num_rows($result)>0)
					{
						echo "<table width='100%' border='2'>";
						echo "<tr>";
  
					//Loop πάνω στα ονόματα των στηλών για να μπουν στον πίνακα
				
					$i = 0;
  
					
   
					//Εμφάνιση των πλειάδων
					while ($rows = mysqli_fetch_array($result,MYSQLI_ASSOC))
						{
						echo "<tr>";
						foreach ($rows as $data)
							{
								echo "<td align='center'>". $data . "</td>";
							}
						echo "</tr>";
						}
					}
				else
					{echo "Δεν έχουν βρεθεί αποτελέσματα!";}
  
				echo "</table>";
				
				//Τερματισμός σύνδεσης
				mysqli_close($conn);
			
			?>	
			</div>

