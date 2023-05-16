<?php
        
					echo 'Τα στοιχεία που παραλήφθηκαν'."<br />";
					echo "<br />";
					
					echo "id_αγώνα:  ";
					echo $_POST['id_αγώνα']."<br />";
					
					echo "Τοποθεσία:  ";
					echo $_POST['Τοποθεσία']."<br />";
					
					echo "Ώρα:  ";
					echo $_POST['Ώρα']."<br />";
					
					echo "Ημερομηνία:  ";
					echo $_POST['Ημερομηνία']."<br />";

                    echo "Νίκη:  ";
					echo $_POST['Νίκη']."<br />";

                    echo "Ήττα:  ";
					echo $_POST['Ήττα']."<br />";

                    echo "Γηπεδούχος:  ";
					echo $_POST['Γηπεδούχος']."<br />";

                    echo "Φιλοξενούμενος:  ";
					echo $_POST['Φιλοξενούμενος']."<br />";

                    echo "Σκόρ:  ";
					echo $_POST['Σκορ']."<br />";
	
		?>
			<p/>
			
		<?php
			//	Ανάθεση μεταβλητών στα δεδομένα από τη φόρμα
				$id_αγώνα=$_POST['id_αγώνα'];
				$Τοποθεσία=$_POST['Τοποθεσία'];
				$Ώρα=$_POST['Ώρα'];
				$Ημερομηνία=$_POST['Ημερομηνία'];
                $Νίκη=$_POST['Νίκη'];
                $Ήττα=$_POST['Ήττα'];
                $Γηπεδούχος=$_POST['Γηπεδούχος'];
                $Φιλοξενούμενος=$_POST['Φιλοξενούμενος'];
                $Σκορ=$_POST['Σκορ'];

		
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
				$sql="INSERT INTO Αγώνας(id_αγώνα,Τοποθεσία,Ώρα,Ημερομηνία,Νίκη,Ήττα,Γηπεδούχος,Φιλοξενούμενος,Σκορ) VALUES('$id_αγώνα','$Τοποθεσία','$Ώρα','$Ημερομηνία','$Νίκη','$Ήττα','$Γηπεδούχος','$Φιλοξενούμενος','$Σκορ')";
				$howmatch="SELECT * 
							FROM Αγώνας";
		        
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