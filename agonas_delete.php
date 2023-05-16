<?php
				
					echo 'Τα στοιχεία που παραλήφθηκαν'."<br />";
					echo "<br />";
					
					echo "Γηπεδούχος:  ";
					echo $_POST['Γηπεδούχος']."<br />";
					
                    echo "Φιλοξενούμενος:  ";
					echo $_POST['Φιλοξενούμενος']."<br />";

                    echo "Τοποθεσία:  ";
					echo $_POST['Τοποθεσία']."<br />";
					
					
		?>
			<p/>
			
		<?php
			//	Ανάθεση μεταβλητών στα δεδομένα από τη φόρμα
				$Γηπεδούχος=$_POST['Γηπεδούχος'];
                $Φιλοξενούμενος=$_POST['Φιλοξενούμενος'];
                $Τοποθεσία=$_POST['Τοποθεσία'];

                $servername = "localhost";
                $username = "root";
                $password = "";
				
		
			//	Σύνδεση με τη ΒΔ
        global $count;
        global $db;
				$db='local_champion';
				$conn = new mysqli($servername, $username, $password);
            // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                        }
                echo "Connected successfully";

				
				//Επιλογή ΒΔ
                $conn = new mysqli($servername, $username, $password, $db);				

				
				//Εισαγωγή των υποερωτήσεων (queries)
				$sql=	"DELETE FROM Αγώνας 
						WHERE Γηπεδούχος='$Γηπεδούχος' AND Φιλοξενούμενος='$Φιλοξενούμενος' AND Τοποθεσία='$Τοποθεσία'";
						
				$howmatch=	"SELECT * 
							FROM Αγώνας";
				
				//Εισαγωγή δεδομένων στη ΒΔ
                $conn = new mysqli($servername, $username, $password, $db);

                $pdo="Set foreign_key_checks = 0";
                $foreign = $conn->query($pdo);

				if ($conn->query($sql) === TRUE) {
                    echo "The record is deleted";
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
				
				$pdo="Set foreign_key_checks = 1";
                $foreign = $conn->query($pdo);
				//Τερματισμός σύνδεσης
				mysqli_close($conn);
			
			?>