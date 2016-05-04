 <?php 
 // We will put the data into a file in the current directory called "data.txt" 
 // But first of all, we need to check if the user actually pushed submit 
 if (isset($_POST['submitButton'])) { 
 // The user clicked submit 
 // Put the contents of the text into the file 
 file_put_contents('./data.txt', $_POST['theName'], FILE_APPEND);
 file_put_contents('./data.txt', $_POST['theEmail'], FILE_APPEND);
 file_put_contents('./data.txt', $_POST['theNum'], FILE_APPEND);
 file_put_contents('./data.txt', $_POST['theYear'], FILE_APPEND);
 file_put_contents('./data.txt', $_POST['theMajor'], FILE_APPEND);
 file_put_contents('./data.txt', $_POST['theMinor'], FILE_APPEND);
 file_put_contents('./data.txt', $_POST['theGrad'], FILE_APPEND);
 file_put_contents('./data.txt', $_POST['theHobby'], FILE_APPEND);
 file_put_contents('./data.txt', $_POST['theText'], FILE_APPEND);  
 // ./data.txt: the text file in which the data will be stored 

 } 
 ?> 
