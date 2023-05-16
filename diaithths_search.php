<?php
				$servername = "localhost";
                $username = "root";
                $password = "";
		
			//	Σύνδεση με τη ΒΔ
            

            
                global $db;
				$db ='local_champion';
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
				
				//Βάζω σε μια μεταβλητή το περιεχόμενο της αναζήτησης
				$something=$_POST['something'];
				
				//Εισαγωγή των υποερωτήσεων (queries)
				$sql=	"SELECT *
						FROM Διαιτητής
						WHERE ΑΜΚΑ LIKE '$something'
						OR Όνομα LIKE '$something' 
						OR Επώνυμο LIKE '$something'
						OR Ηλικία LIKE '$something'
                        OR Τύπος_διαιτητή LIKE '$something'";
                        

				
				
				//Παίρνω τα δεδομένα από τη Βάση Δεδομένων
                $result=mysqli_query($conn,$sql);

		
		
				//Έλεγχος για το μέγεθος του πίνακα
				if (mysqli_num_rows($result)>0)
					{
						echo "<table width='100%' border='2'>";
						echo "<tr>";
  
					
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