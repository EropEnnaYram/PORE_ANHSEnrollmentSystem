
<?php
include 'EnrollmentSystem_BaseDAO.php';

class userDAO extends EnrollmentSystem_BaseDAO{
	function LoginUser($username,$password){
		$this->openConn();
		$stmt=$this->dbh->prepare("SELECT username , password FROM students WHERE username=? AND password=?");
		$stmt->bindParam(1,$username);
		$stmt->bindParam(2,$password);
		$stmt->execute();

		$this->closeConn();

		while ($row=$stmt->fetch()) {
			return true;
		}
	}
	function viewSubjects($username){
		$this->openConn();
		$stmt=$this->dbh->prepare("SELECT subjects_id,subjects_name,units FROM subjects as s ,students as st ,students_subjects_table as sct WHERE st.users_id=sct.users_id AND s.subjects_id=sct.subjects_id AND st.username=?");
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
	function addSubjects($subjects_id,$subjects_name, $units,$username){
		$this->openConn();
		$insert_statement=$this->dbh->prepare("INSERT into subjects (subjects_name, units) VALUES(?, ?)");
		$insert_statement->bindParam(1,$subjects_name);
		$insert_statement->bindParam(2,$units);
		$insert_statement->execute();
		$subjects_id =$this->dbh->lastInsertId();

		$insert_statement2=$this->dbh->prepare("SELECT students_id FROM students WHERE username=?");
		$insert_statement2->bindParam(1,$username);
		$insert_statement2->execute();
		$users_id=$this->fetch();

		$insert_statement3=$this->dbh->prepare("INSERT INTO students_subjects_table(subjects_id,students_id)VALUES(?,?)");
		$insert_statement3->bindParam(1,$subjects_id);
		$insert_statement3->bindParam(2,$users_id[0]);
		$insert_statement3->execute();



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

	/*function viewUserSchedule($username){
		$this->openConn();
		$stmt=$this->dbh->prepare("SELECT time_start,time_end,subjects_name,t.firstname,t.lastname,days,date FROM schedules as sc,subjects as su, teachers as t,days as d,sections as se,students as st, schedules_connect_table as sct WHERE sct.schedules_id=sc.schedules_id AND sct.subjects_id=su.subjects_id AND sct.teachers_id=t.teachers_id AND sct.days_id=d.days_id AND sct.sections_id=se.sections_id AND sct.students_id=st.students_id AND st.username=?");
		$stmt->bindParam(1,$username);
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

		}
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
			
			//echo "<td><button onclick='deleteTeachers(".$id.")'>DELETE</button></td>";
			//echo "<td><button onclick='editTeachers(".$id.")'>EDIT</button></td>";
			echo"</tr>";

	   
        
        //echo $firstname."-".$lastname."-".$type."-".$grade."-";
		$this->closeConn();

    }
	function viewSections(){
        $this->openConn();
        $stmt=$this->dbh->prepare("SELECT * FROM sections;");
        $stmt->execute();

        $this->closeConn();

        while($row=$stmt->fetch()) {
        	echo "<tr id=".$row[0].">";
        	echo "<td>".$row[0]."</td>";
        	echo "<td>".$row[1]."</td>";
        	echo "<td>".$row[2]."</td>";
        	echo "<td><button onclick='deleteSections(".$row[0].")'>DELETE</button></td>";
        	echo "<td><button onclick='editSections(".$row[0].")'>EDIT</button></td>";
        	echo "</tr>";

        }
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
		//echo $subject_id;

	
	function searchSubjects($subjects_id){
		$this->openConn();
		$stmt=$this->dbh->prepare("SELECT * FROM subjects WHERE subjects_id=?");
		$stmt->bindParam(1, $subjects_id);
		$stmt->execute();
		
		$found=false;
		
		while ($row=$stmt->fetch()) {
			if(!$found){
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
	   /*($this->closeConn();
	}
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
		
		$this->closeConn();*/
}
?>