<?php
					
					echo 'Τα στοιχεία που παραλήφθηκαν'."<br />";
					echo "<br />";
					
					echo "ΑΜΚΑ:  ";
					echo $_POST['ΑΜΚΑ']."<br />";
					
					echo "Όνομα:  ";
					echo $_POST['Όνομα']."<br />";
					
					echo "Επώνυμο:  ";
					echo $_POST['Επώνυμο']."<br />";
					
					echo "Ηλικία:  ";
					echo $_POST['Ηλικία']."<br />";

                    echo "Θέση:  ";
					echo $_POST['Θέση']."<br />";

                    echo "Αριθμός:  ";
					echo $_POST['Αριθμός']."<br />";
					
					echo "Κλεψίματα:  ";
					echo $_POST['Κλεψίματα']."<br />";
					
					echo "Ασίστ:  ";
					echo $_POST['Ασίστ']."<br />";
					
					echo "Rebound:  ";
					echo $_POST['Rebound']."<br />";

                    echo "Πόντοι:  ";
					echo $_POST['Πόντοι']."<br />";

                    echo "Μπλοκ:  ";
					echo $_POST['Μπλοκ']."<br />";
					
					echo "Χρόνος_που_αγωνίζεται:  ";
					echo $_POST['Χρόνος_που_αγωνίζεται']."<br />";
					
					echo "Βάρος:  ";
					echo $_POST['Βάρος']."<br />";

                    echo "Ύψος:  ";
					echo $_POST['Ύψος']."<br />";

                    
	
		?>
			<p/>
			
		<?php
			//	Ανάθεση μεταβλητών στα δεδομένα από τη φόρμα
				$ΑΜΚΑ=$_POST['ΑΜΚΑ'];
				$Όνομα=$_POST['Όνομα'];
				$Επώνυμο=$_POST['Επώνυμο'];
				$Ηλικία=$_POST['Ηλικία'];
                $Θέση=$_POST['Θέση'];
                $Αριθμός=$_POST['Αριθμός'];
				$Κλεψίματα=$_POST['Κλεψίματα'];
				$Ασίστ=$_POST['Ασίστ'];
				$Rebound=$_POST['Rebound'];
                $Πόντοι=$_POST['Πόντοι'];
                $Μπλοκ=$_POST['Μπλοκ'];
				$Χρόνος_που_αγωνίζεται=$_POST['Χρόνος_που_αγωνίζεται'];
				$Βάρος=$_POST['Βάρος'];
                $Ύψος=$_POST['Ύψος'];
                

		
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
				$sql="INSERT INTO Παίκτης(ΑΜΚΑ,Όνομα,Επώνυμο,Ηλικία,Θέση,Αριθμός,Κλεψίματα,Ασίστ,Rebound,Πόντοι,Μπλοκ,Χρόνος_που_αγωνίζεται,Βάρος,Ύψος) VALUES('$ΑΜΚΑ','$Όνομα','$Επώνυμο','$Ηλικία','$Θέση','$Αριθμός','$Κλεψίματα','$Ασίστ','$Rebound','$Πόντοι','$Μπλοκ','$Χρόνος_που_αγωνίζεται','$Βάρος','$Ύψος')";
				$howmatch="SELECT * 
							FROM Παίκτης";
		        
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