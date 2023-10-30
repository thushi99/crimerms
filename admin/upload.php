<?php
// Check if the user is logged in
session_start();
require_once('includes/dbconnection.php');

if (!isset($_SESSION['id']) || $_SESSION['id'] <= 0) 
{
    // Redirect to the login page or display an error message
    header("Location: ./login.php");
    exit; // Terminate script execution
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "audit_trailing";

// Initialize variables for file upload
$targetDirectory = "uploads/";
$targetFile = "";
$uploadOk = 1;
$FileType = "";

// Check if a file is uploaded
if (isset($_FILES["evidencefile"]) && $_FILES["evidencefile"]["name"]) {
    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get user details from the form
    $caseid = $_POST["caseID"];
    $evidencename = $_POST["evidenceName"];
    $fingerprint = $_POST["fingerprint"];
    $recoveredfrom = $_POST["recoveredFrom"];
    $assignedOfficer = $_POST["assignedOfficer"];

    // Handle file upload
    $targetFile = $targetDirectory . basename($_FILES["evidencefile"]["name"]);
    $FileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["evidencefile"]["tmp_name"]);
    if ($check === false) {
        echo '<script>alert("File is not an image.");</script>';
        $uploadOk = 0;
    }

    // Check file size (adjust the size limit as needed)
    if ($_FILES["evidencefile"]["size"] > 5000000) {
        echo '<script>alert("Sorry, your file is too large.");</script>';
        $uploadOk = 0;
    }

    // Allow certain file formats (you can customize this)
    $allowedFormats = array("jpg", "jpeg", "png","zip","mp3","tar","mp4","mkv","exe");
    if (!in_array($FileType, $allowedFormats)) {
        echo '<script>alert("Sorry, only JPG, JPEG, PNG files are allowed.");</script>';
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) 
    {
        echo '<script>alert("Sorry, your file was not uploaded.");</script>';
    } 
    else 
    {
        if (move_uploaded_file($_FILES["evidencefile"]["tmp_name"], $targetFile)) 
        {
            echo '<script>alert("The file ' . htmlspecialchars(basename($_FILES["evidencefile"]["name"])) . ' has been uploaded.");</script>';

            // Calculate MD5 hash of the uploaded file
            $fileHash = md5_file($targetFile);

            // Retrieve the username from the session
            $staffUser = $_SESSION['username'];


            // Insert user details and file path into the database
            $sql = "INSERT INTO evidence (caseID, evidenceName, fingerPrint, recoveredFrom, assignedOfficer, imagePath, fileHash, uploadedBy) VALUES ('$caseid', '$evidencename', '$fingerprint', '$recoveredfrom', '$assignedOfficer', '$targetFile', '$fileHash', '$staffUser')";

            if ($conn->query($sql) === TRUE)
            {
                // Create a log entry
                $logMessage = "Uploaded '" . $targetFile . "' for case '" . $caseid . "'";
                
                // Use a prepared statement for inserting log entries
                $logSql = "INSERT INTO logs (user_id, action_made) VALUES (?, ?)";
                $stmt = $conn->prepare($logSql);
                
                // Bind parameters
                $stmt->bind_param("is", $_SESSION['id'], $logMessage);
                
                if ($stmt->execute()) {
                    echo '<script>alert("Data inserted successfully!");</script>';
                } else {
                    echo '<script>alert("Error inserting log data: ' . $stmt->error . '");</script>';
                }

                // Close the prepared statement
                $stmt->close();

            }
            else
            {
                echo '<script>alert("Error: ' . $sql . '\\n' . $conn->error . '");</script>';
            }
        } 
        else 
        {
            echo '<script>alert("Sorry, there was an error uploading your file.");</script>';
        }
    }
}

?>
