<?php
        
					echo 'Τα στοιχεία που παραλήφθηκαν'."<br />";
					echo "<br />";
					
					echo "ΑΜΚΑ:  ";
					echo $_POST['ΑΜΚΑ']."<br />";
					
					echo "Όνομα  ";
					echo $_POST['Όνομα']."<br />";
					
					echo "Επώνυμο:  ";
					echo $_POST['Επώνυμο']."<br />";
					
					echo "Ηλικία:  ";
					echo $_POST['Ηλικία']."<br />";

                    echo "Χρόνια_εμπειρίας:  ";
					echo $_POST['Χρόνια_εμπειρίας']."<br />";

                    
	
		?>
			<p/>
			
		<?php
			//	Ανάθεση μεταβλητών στα δεδομένα από τη φόρμα
				$ΑΜΚΑ=$_POST['ΑΜΚΑ'];
				$Όνομα=$_POST['Όνομα'];
				$Επώνυμο=$_POST['Επώνυμο'];
				$Ηλικία=$_POST['Ηλικία'];
                $Χρόνια_εμπειρίας=$_POST['Χρόνια_εμπειρίας'];
                

		
                $servername = "localhost";
                $username = "root";
                $password = "";
		
			//	Σύνδεση με τη ΒΔ
            

            
                global $db;
                global $count;
				$db ='local_champion';
                $conn = new mysqli($servername, $username, $password);
            // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                        }
                echo "Connected successfully";

				//Επιλογή ΒΔ
                $conn = new mysqli($servername, $username, $password, $db);				
				//Εισαγωγή των υποερωτήσεων (queries)
				$sql="INSERT INTO Προπονητής(ΑΜΚΑ,Όνομα,Επώνυμο,Ηλικία,Χρόνια_εμπειρίας) VALUES('$ΑΜΚΑ','$Όνομα','$Επώνυμο','$Ηλικία','$Χρόνια_εμπειρίας')";
				$howmatch="SELECT * 
							FROM Προπονητής";
		        
				//Εισαγωγή δεδομένων στη ΒΔ
                $conn = new mysqli($servername, $username, $password, $db);

                $pdo="Set foreign_key_checks = 0";
                $foreign = $conn->query($pdo);
                

				if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                  } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                  }

				//Αίτηση με id=1
				$Res=$conn->query($howmatch);
				while($row=mysqli_fetch_array($Res))
				{
					$count++;
				}
				echo "Νέο σύνολο: ".$count." εγγραφές.";
				echo "<br />";
				
				
				//Τερματισμός σύνδεσης
                $pdo="SET foreign_key_checks = 1";
                $foreign = $conn->query($pdo);
				mysqli_close($conn);
                
                

			
			?>