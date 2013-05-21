<?php
include 'EnrollmentSystem_BaseDAO.php';
class Enrollment_SystemDAO extends EnrollmentSystem_BaseDAO {
	/*function LoginAdmin(){
		$this->openConn();
		$stmt=$this->dbh->prepare("SELECT username and password from admin where username='anne' and password='pore'");
		$stmt->bindParam(1,$username);
		$stmt->bindParam(2,$password);
		$stmt->execute();
				if($row=$stmt->fetch() ){
						return true;
				}else{
						return false;
				}
		$this->closeConn();
	}*/

	function viewSubjects(){
		$this->openConn();
		$stmt=$this->dbh->prepare("SELECT * FROM subjects");
		$stmt->execute();

		$this->closeConn();

		while($row=$stmt->fetch()){
			echo "<tr id=".$row[0].">";
			echo "<td>".$row[0]."</td>";
			echo "<td>".$row[1]."</td>";
			echo "<td>".$row[2]."</td>";
			echo "<td><button onclick='deleteSubjects(".$row[0].")'>DELETE</button></td>";
			echo "<td><button onclick='editSubjects(".$row[0].")'>EDIT</button></td>";
			echo "</tr>";

		}
		//echo $subject_id;

	}
	function addSubjects($subjects_name, $units) {
		$this->openConn();
		$insert_statement=$this->dbh->prepare("INSERT into subjects (subjects_name, units) VALUES(?, ?)");
		$insert_statement->bindParam(1,$subjects_name);
		$insert_statement->bindParam(2,$units);
		$insert_statement->execute();
		$subjects_id = $this->dbh->lastInsertId();

		$this->closeConn();

		//echo "<script>alert('added')</script>";
		echo "<tr id=".$subjects_id.">";
		echo "<td>".$subjects_id."</td>";
		echo "<td>".$subjects_name."</td>";
		echo "<td>".$units."</td>";
		echo "<td><button onclick='deleteSubjects(".$subjects_id.")'>DELETE</button></td>";
		echo "<td><button onclick='editSubjects'(".$subjects_id.")'>EDIT</button></td>";
		echo "</tr>";
		echo $subjects_name."-".$units;
		
	}
	function searchSubjects($subjects_id){
		$this->openConn();
		$stmt=$this->dbh->prepare("SELECT * FROM subjects WHERE subjects_id=?");
		$stmt->bindParam(1, $subjects_id);
		$stmt->execute();
		
		$found=false;
		
		echo "<tr>";
			echo "<td>subjects_id</td>";
			echo "<td>subjects_name</td>";
			echo "<td>units</td>";
		echo "</tr>";
		while($row=$stmt->fetch()) {
			if(!$found){
		    echo "<tr>";
		   	echo "tr id=".$row[0].">";
		   	echo "<td>".$row[0]."</td>";
		   	echo "<td>".$row[1]."</td>";
		   	echo "<td>".$row[2]."</td>";
		   	echo "</tr>";

			$found= true;

		   }else{
		   	echo "Not found";
		   
			
	   
		}
	  /* 
	   */
	}
	   $this->closeConn();
    }
	function deleteSubjects($subjects_id) {
		$this->openConn();
		$stmt=$this->dbh->prepare("DELETE FROM subjects where subjects_id=?");
		$stmt->bindParam(1,$subjects_id);
		$stmt->execute();

		$this->closeConn();
	}
	function retrieveSubjects($subjects_id){
		$this->openConn();
		$stmt=$this->dbh->prepare("SELECT * FROM subjects WHERE subjects_id=?");
		$stmt->bindParam(1,$subjects_id);
		$stmt->execute();

		$record=$stmt->fetch();

		$word= array("subjects_id"=>$record[0] ,"subjects_name"=>$record[1], "units"=>$record[2]);

		$json_string=json_encode($word);

		echo $json_string;

		$this->closeConn();
	}
	function saveSubjects($subjects_id,$subjects_name,$units){
		$this->openConn();
		$stmt=$this->dbh->prepare("UPDATE subjects SET subjects_name=?, units=? WHERE subjects_id=?");
		$stmt->bindParam(1,$subjects_name);
		$stmt->bindParam(2,$units);
		$stmt->bindParam(3,$subjects_id);
		$stmt->execute();
		
		echo $subjects_id;
		echo "<td>".$subjects_id."</td>";	
		echo "<td>".$subjects_name."</td>";
		echo "<td>".$units."</td>";
		
		$this->closeConn();
	}
	function viewTeachers(){
		$this->openConn();
		$stmt=$this->dbh->prepare("SELECT * FROM teachers ORDER BY lastname ASC");
		$stmt->execute();

		$this->closeConn();

		while($row=$stmt->fetch()){
			echo "<tr id=".$row[0].">";
			echo "<td>".$row[0]."</td>";
			echo "<td>".$row[1]."</td>";
			echo "<td>".$row[2]."</td>";
			echo "<td>".$row[3]."</td>";
			echo "<td>".$row[4]."</td>";
			echo "<td><button onclick='deleteTeachers(".$row[0].")'>DELETE</button></td>";
			echo "<td><button onclick='editTeachers(".$row[0].")'>EDIT</button></td>";
			echo"</tr>";

		}
	}
	function searchTeachers($teachers_id){
		$this->openConn();
		$stmt=$this->dbh->prepare("SELECT * FROM teachers WHERE teachers_id=?");
		$stmt->bindParam(1,$teachers_id);
		$stmt->execute();

		$found=false;

		while($row=$stmt->fetch()){
			if(!$found){
			echo "<tr id=".$row[0].">";
			echo "<td>".$row[0]."</td>";
			echo "<td>".$row[1]."</td>";
			echo "<td>".$row[2]."</td>";
			echo "<td>".$row[3]."</td>";
			echo "<td>".$row[4]."</td>";
			echo "</tr>";

			$found=true;

		}else{
			echo "Not Found";

		}
		$this->closeConn();
	}
}
	function addTeachers($firstname,$lastname,$type,$grade) {
		$this->openConn();
		$insert_statement=$this->dbh->prepare("INSERT into teachers(firstname,lastname,type,grade) VALUES(?,?,?,?)");
		$insert_statement->bindParam(1,$firstname);
		$insert_statement->bindParam(2,$lastname);
		$insert_statement->bindParam(3,$type);
		$insert_statement->bindParam(4,$grade);
		$insert_statement->execute();
		$id  = $this->dbh->lastInsertId();
		
			echo "<tr id=".$id.">";
			echo "<td>".$id."</td>";
			echo "<td>".$firstname."</td>";
			echo "<td>".$lastname."</td>";
			echo "<td>".$type."</td>";
			echo "<td>".$grade."</td>";
			
			echo "<td><button onclick='deleteTeachers(".$id.")'>DELETE</button></td>";
			echo "<td><button onclick='editTeachers(".$id.")'>EDIT</button></td>";
			echo"</tr>";

	   
        
        //echo $firstname."-".$lastname."-".$type."-".$grade."-";
		$this->closeConn();

    }
    function deleteTeachers($teachers_id){
    	$this->openConn();
    	$stmt=$this->dbh->prepare("DELETE  FROM teachers where teachers_id=?");
    	$stmt->bindParam(1,$teachers_id);
    	$stmt->execute();

    	$this->closeConn();
    }
    function retrieveTeachers($teachers_id){
    	$this->openConn();
    	$stmt=$this->dbh->prepare("SELECT * from teachers WHERE teachers_id=?");
    	$stmt->bindParam(1,$teachers_id);
    	$stmt->execute();

    	$record=$stmt->fetch();

    	$word=array("teachers_id"=>$record[0], "firstname"=>$record[1], "lastname"=>$record[2], "type"=>$record[3], "grade"=>$record[4]);
    	$json_string=json_encode($word);
    	echo $json_string;
    	$this->closeConn();
    }
    function saveTeachers($teachers_id,$firstname,$lastname,$type,$grade){
    	$this->openConn();
    	$stmt=$this->dbh->prepare("UPDATE teachers set firstname=?, lastname=?, type=?, grade=? WHERE teachers_id=?");
    	$stmt->bindParam(1,$firstname);
    	$stmt->bindParam(2,$lastname);
    	$stmt->bindParam(3,$type);
    	$stmt->bindParam(4,$grade);
    	$stmt->bindParam(5,$teachers_id);
    	$stmt->execute();

    	echo "<td>".$teachers_id."</td>";
    	echo "<td>".$firstname."</td>";
    	echo "<td>".$lastname."<td>";
    	echo "<td>".$type."</td>";
    	echo "<td>".$grade."</td>";

    	$this->closeConn();

    }
    function viewSections(){
        $this->openConn();
        $stmt=$this->dbh->prepare("SELECT * FROM sections;");
        $stmt->execute();

        $this->closeConn();

        while($row=$stmt->fetch()) {
        	echo "<td>".$row[0]."</td>";
        	echo "<td>".$row[1]."</td>";
        	echo "<td>".$row[2]."</td>";
        	echo "<td><button onclick='deleteSections(".$row[0].")'>DELETE</button></td>";
        	echo "<td><button onclick='editSections(".$row[0].")'>EDIT</button></td>";
        	echo "</tr>";

        }
     }
    function addSections($grade,$sections_name){
    	$this->openConn();
    	$insert_statement=$this->dbh->prepare("INSERT into sections (grade,sections_name) VALUES (?,?)");
    	$insert_statement->bindParam(1,$grade);
    	$insert_statement->bindParam(2,$sections_name);
    	$insert_statement->execute();
    	$sections_id  = $this->dbh->lastInsertId();

    	//echo $grade."-".$sections_name;
    	echo "<tr id=".$sections_id.">";
    	echo "<td>".$sections_id."</td>";
		echo "<td>".$grade."</td>";
		echo "<td>".$sections_name."</td>";
		echo "<td><button onclick='deleteSubjects(".$sections_id.")'>DELETE</button></td>";
		echo "<td><button onclick='editSubjects'(".$sections_id.")'>EDIT</button></td>";
		echo "</tr>";
    	echo $grade;
    	$this->closeConn();
    }
    function deleteSections($sections_id){
    	$this->openConn();
    	$stmt=$this->dbh->prepare("DELETE FROM sections WHERE sections_id=?");
    	$stmt->bindParam(1,$sections_id);
    	$stmt->execute();

    	$this->closeConn();
    }
    function searchSections($sections_id){
    	$this->openConn();
    	$stmt=$this->dbh->prepare("SELECT * FROM sections WHERE sections_id=?");
    	$stmt->bindParam(1,$sections_id);
    	$stmt->execute();

 		$found=false;

 		while($row=$stmt->fetch()){
 			if(!$found){
 				echo "<tr id=".$row[0].">";
	        	echo "<td>".$row[0]."</td>";
	        	echo "<td>".$row[1]."</td>";
	        	echo "<td>".$row[2]."</td>";

	        	$found=true;
 		}else{
 			echo "Not Found";
 		}
 	}
 		$this->closeConn();
    }
    function retrieveSections($sections_id){
    	$this->openConn();
    	$stmt=$this->dbh->prepare("SELECT * FROM sections WHERE sections_id=?");
    	$stmt->bindParam(1,$sections_id);
    	$stmt->execute();

    	$record=$stmt->fetch();

    	$word=array("sections_id"=>$record[0], "grade"=>$record[1], "sections_name"=>$record[2]);
    	$json_string=json_encode($word);
    	echo $json_string;
    	$this->closeConn();

    }
    function saveSections($sections_id,$grade,$sections_name){
    	$this->openConn();
    	$stmt=$this->dbh->prepare("UPDATE sections SET grade=?, sections_name=? WHERE sections_id=?");
    	$stmt->bindParam(1,$grade);
    	$stmt->bindParam(2,$sections_name);
    	$stmt->bindParam(3,$sections_id);
    	$stmt->execute();

    	echo "<td>".$sections_id."</td>";
    	echo "<td>".$grade."</td>";
    	echo "<td>".$sections_name."</td>";

    	$this->closeConn();
    }
    function viewStudents(){
    	$this->openConn();
    	$stmt=$this->dbh->prepare("SELECT * FROM students");
    	$stmt->execute();

    	$this->closeConn();

    	while($row=$stmt->fetch()) { 
    		echo "<tr id=".$row[0].">";
    		echo "<td>".$row[0]."</td>";
    		echo "<td>".$row[1]."</td>";
    		echo "<td>".$row[2]."</td>";
    		echo "<td>".$row[3]."</td>";
    		echo "<td>".$row[4]."</td>";
    		echo "<td>".$row[5]."</td>";
    		echo "<td>".$row[6]."</td>";
    		echo "<td>".$row[7]."</td>";
    		echo "<td>".$row[8]."</td>";
    		echo "<td>".$row[9]."</td>";
    		echo "<td><button onclick='deleteStudents(".$row[0].")'>DELETE</button></td>";
    		echo "</tr>";

    	}
    }
    function addStudents($firstname,$middleInitial,$lastname,$year,$phone,$email,$username,$password,$confirm_password){
    	$this->openConn();
    	$insert_statement=$this->dbh->prepare("INSERT into students (firstname,middleInitial,lastname,year,phone,email,username,password,confirm_password) VALUES (?,?,?,?,?,?,?,?,?)");
    	$insert_statement->bindParam(1,$firstname);
    	$insert_statement->bindParam(2,$middleInitial);
    	$insert_statement->bindParam(3,$lastname);
    	$insert_statement->bindParam(4,$year);
    	$insert_statement->bindParam(5,$phone);
    	$insert_statement->bindParam(6,$email);
    	$insert_statement->bindParam(7,$username);
    	$insert_statement->bindParam(8,$password);
    	$insert_statement->bindParam(9,$confirm_password);
    	$insert_statement->execute();

    	$this->closeConn();

    }
    function deleteStudents($students_id){
    	$this->openConn();
    	$deleteStmt=$this->dbh->prepare("DELETE FROM students where students_id=?");
    	$deleteStmt->bindParam(1,$students_id);
    	$deleteStmt->execute();

    	$this->closeConn();
    }
    function viewStudentSchedule(){
    	$this->openConn();
    	$stmt=$this->dbh->prepare("SELECT * FROM schedules");
    	$stmt->execute();

    	$this->closeConn();

    	while($row=$stmt->fetch()) {
    		echo "<tr id=".$row[0].">";
    		echo "<td>".$row[0]."</td>";
    		echo "<td>".$row[1]."</td>";
    		echo "<td>".$row[2]."</td>";
    		echo "<td>".$row[3]."</td>";
    		echo "</tr>";
    	}

    }
    function addStudentSchedule($time_start,$time_end,$date){
    	$this->openConn();
    	$insert_statement=$this->dbh->prepare("INSERT into schedules (time_start,time_end,date) VALUES(?,?,?)");
    	$insert_statement->bindParam(1,$time_start);
    	$insert_statement->bindParam(2,$time_end);
    	$insert_statement->bindParam(3,$date);
    	$insert_statement->execute();

    	$this->closeConn();

    }

}
