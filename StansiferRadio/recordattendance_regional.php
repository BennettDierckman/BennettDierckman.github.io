<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
    //already checked for active in login php
    $school_email = $mysqli->escape_string($_SESSION['school_email']);
    $first_name = $mysqli->escape_string($_SESSION['first_name']);
    $last_name = $mysqli->escape_string($_SESSION['last_name']);
    $chapter = $mysqli->escape_string($_POST['selectedChapter']);
    $_SESSION['chapter'] = $chapter;

    $type = $mysqli->escape_string($_SESSION['type']);
    $region = $mysqli->escape_string($_SESSION['region']);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Regional Attendance</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/style.css">

  <script type="text/javascript">
    var datefield=document.createElement("input")
    datefield.setAttribute("type", "date")
    if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
        document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n') 
    }
  </script>
   
  <script>
  if (datefield.type!="date"){ //if browser doesn't support input type="date", initialize date picker widget:
      jQuery(function($){ //on document.ready
          $('#birthday').datepicker();
      })
  }
  </script>
</head>

<body>

  <div class="form">   
    <div style ="width: 50%; margin: 0 auto; display: flex; justify-content: center;">
        <img src="VBMA_Logo.png" alt="VMBA LOGO">
    </div><hr>
      <ul class="tab-group ">
<!--         <li class="tab"><a href="#logMeeting">Record Attendance</a></li>
 -->        <li class="tab active"><a href="#viewMeetings">View<br>Meetings</a></li>
        <li class="tab"><a href="#viewChapterLog">Chapter<br>Reccords</a></li>
      </ul>
      
      <div class="tab-content">

        <div id="viewMeetings">   
          <h1 style="margin-bottom: 20px;"><?php echo $chapter; ?>&rsquo;s<br>Current Joinable Meetings</h1>

          <?php
            // $sql1 = "SELECT * FROM meetings WHERE chapter='$chapter'";
            //THE BIG ONE
            $sql1 = "SELECT * FROM meetings WHERE active = '1' AND chapter ='". $chapter ."'";

            $result1 = $mysqli->query($sql1);

            $numRows1 = $result1->num_rows;
            
            if ($numRows1 > 0){
              $counter = 1;
              echo '<span style="color:white; display: flex; justify-content: center;"><table border=1 color:white><tr><th>Alter Button</th><th>Meeting ID</th><th>Attendance Date</th><th>Attendance Points</th><th>Category</th><th>Discription</th><th>Close Meeting Button</th></tr>';
              while($row = $result1->fetch_assoc()){
                  echo "<tr>";
                  echo "<td><form action='AlterMeeting_Regional.php' method='POST'><input type='hidden' name='meetingId' value='".$row["id"]."'><button type='submit' class='button button-block orangeButton' style='font-size: 20px;'>Adjust Info</button></form></td>";
                  echo "<td><form action='CloseMeeting.php' method='POST'><input type='hidden' name='meetingId' value='".$row["id"]."'>" . $row["id"] . "</td>";
                  echo "<td><input type='hidden' name='birthday' value='".$row["attendanceDate"]."'>" . $row["attendanceDate"] . "</td>";
                  echo "<td><input type='hidden' name='credits' value='".$row["NumberOfPoints"]."'>" . $row["NumberOfPoints"] . "</td>";
                  echo "<td><input type='hidden' name='category' value='".$row["category"]."'>" . $row["category"] . "</td>";
                  echo "<td><input type='hidden' name='category' value='".$row["meetingDiscription"]."'>" . $row["meetingDiscription"] . "</td>";
                  echo "<td><button type='submit' class='button button-block Red_Btn' style='font-size: 20px;'>Close Meeting</button></td></form>";
                  echo "</tr>";
                  $counter += 1;
                }
                echo "</table></span><br>";
              }
            else {
              echo "<p style='margin-bottom: 20px;'>No Joinable Meetings At this Time.</p>";
            }
            ?>
          <form class="form-inline" method="post" action="regional_landing.php">
            <button class="button button-block RL_Btn" name="displayLog" />Select Chapter</button>
          </form>
          <hr>
          <form class="form-inline" method="post" action="index.php">
            <button class="button button-block" name="displayLog" />Logout</button>
          </form>

        </div>
          
        <!-- <div id="logMeeting" style="display:none;">   
          <h1>Enter Date &amp; Credit Hours</h1>
          
          <form action="enterData.php" method="post" autocomplete="off">
          

          <div class="field-wrap">
            <input type="date" id="birthday" name="birthday" size="20" />
          </div>

          <div class="field-wrap">
            <label>
              Meeting Credit Hours<span class="req">*</span><span id='message'></span>
            </label>
            <input type="number" step="0.1" required autocomplete="off" name="credits" id="num_credits"  />
          </div>

          <div class="field-wrap">
            <h1 style="font-size: 20px; text-align: left;">Select Category
              <select name="category">
                <option value="category1">Category 1</option>
                <option value="category2">Category 2</option>
                <option value="category3">Category 3</option>
                <option value="category4">Category 4</option>
              </select>
            </h1>
          </div>
          
          <button type="submit" class="button button-block" name="newEntry" />Enter Data</button>
          </form>
          <hr>
          <form class="form-inline" method="post" action="index.php">
            <button class="button button-block" name="displayLog" />Logout</button>
          </form>

        </div>   -->
        
        <div id="viewChapterLog" style="display: none">   
          <h1 style="margin-bottom: 20px;"><?php echo $chapter; ?>&rsquo;s<br>Chapter Certificate Report</h1>
          
          <?php

          $sql = 'select first_name, last_name, category1, category2, category3, category4, Certificate from users where school="'. $chapter.'" ORDER BY Certificate DESC, last_name';

          $result = $mysqli->query($sql);
          $counter = 0;
          if ($result->num_rows >= 1){
            echo "<span style='color:white; display: flex; justify-content: center;'><table border=1 color='white'><tr><th>First Name</th><th>Last Name</th><th>Category 1</th><th>Category 2</th><th>Category 3</th><th>Category 4</th><th>Certificate</th></tr>";
          }
          else {
            echo "<p>Not enough data to generate report.</p>";
          }
          while ($row = $result->fetch_assoc()){
            $counter += 1;
            echo "<tr>";
            echo "<td>".$row['first_name']."</td>";
            echo "<td>".$row['last_name']."</td>";
            echo "<td>".$row['category1']."</td>";
            echo "<td>".$row['category2']."</td>";
            echo "<td>".$row['category3']."</td>";
            echo "<td>".$row['category4']."</td>";
            echo "<td>".$row['Certificate']."</td>";            
            echo "</tr>";
          }
          echo "</table></span>"
          ?>
          <hr>
            <?php
            if($type == 'chapter leader'){
              echo '<a href="lookAtData_chapter.php"><button type="button" id="pdf" name="generate_pdf" class="button button-block orangeButton"/>Adjust Data</button></a>';
            }
            else{
              echo '<a href="lookAtData_regional.php"><button type="button" id="pdf" name="generate_pdf" class="button button-block orangeButton"/>See More</button></a>';
            }
            ?>
            <hr>
            <!-- <button type="submit" id="pdf" name="generate_pdf" class="button button-block"/>Approved Attendance PDF</button> -->
          <form class="form-inline" method="post" action="regional_landing.php">
            <button class="button button-block RL_Btn" name="displayLog" />Select Chapter</button>
          </form>
          <hr>
          <form class="form-inline" method="post" action="index.php">
            <button class="button button-block" name="displayLog" />Logout</button>
          </form>

        </div>
      </div><!-- tab-content -->
      
  </div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>


</body>
</html>