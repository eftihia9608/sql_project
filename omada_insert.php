<?php
        
					echo 'Τα στοιχεία που παραλήφθηκαν'."<br />";
					echo "<br />";
					
					echo "id_Ομάδας:  ";
					echo $_POST['id_ομάδας']."<br />";
					
					echo "Έδρα:  ";
					echo $_POST['Έδρα']."<br />";
					
					echo "Αγώνες:  ";
					echo $_POST['Αγώνες']."<br />";
					
					echo "Νίκες:  ";
					echo $_POST['Νίκες']."<br />";

                    echo "Όνομα Ομάδας:  ";
					echo $_POST['Όνομα']."<br />";
	
		?>
			<p/>
			
		<?php
			//	Ανάθεση μεταβλητών στα δεδομένα από τη φόρμα
				$id_ομάδας=$_POST['id_ομάδας'];
				$Έδρα=$_POST['Έδρα'];
				$Αγώνες=$_POST['Αγώνες'];
				$Νίκες=$_POST['Νίκες'];
                $Όνομα=$_POST['Όνομα'];
		
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

				//Επιλογή ΒΔ
                $conn = new mysqli($servername, $username, $password, $db);				
				//Εισαγωγή των υποερωτήσεων (queries)
				$sql="INSERT INTO Ομάδα (id_ομάδας,Έδρα,Αγώνες,Νίκες,Όνομα) VALUES('$id_ομάδας','$Έδρα','$Αγώνες','$Νίκες','$Όνομα')";
				$howmatch="SELECT * 
							FROM Ομάδα";
		        
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