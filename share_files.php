<?php
session_start();

$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "a310");

$toaddr = $_POST['to_address'];
$fromaddr = $_SESSION['username'];
$filePath = '';

// Check if the file was uploaded
if(isset($_FILES['attachment']) && $_FILES['attachment']['error'] == UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['attachment']['tmp_name'];
    $fileName = $_FILES['attachment']['name'];
    $fileSize = $_FILES['attachment']['size'];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    
    // Validate file type and size (limit to 5MB)
    $allowedExtensions = array('jpg', 'jpeg', 'png', 'pdf');
    if(in_array($fileExtension, $allowedExtensions) && $fileSize <= 5242880) {
        $uploadFileDir = './uploads/';
        if (!is_dir($uploadFileDir)) {
            mkdir($uploadFileDir, 0777, true); // Create the directory if it doesn't exist
        }
        $destPath = $uploadFileDir . $fileName;

        // Move file to server directory
        if(move_uploaded_file($fileTmpPath, $destPath)) {
            $filePath = $destPath;
        } else {
            echo "<script>alert('Error moving the file.');</script>";
            exit;
        }
    } else {
        echo "<script>alert('Invalid file type or size exceeded (max 5MB).');</script>";
        exit;
    }
}

// Verify recipient user ID exists
$t = mysqli_query($con, "SELECT user_id FROM users WHERE user_id = '$toaddr'");
$tr = mysqli_num_rows($t);

if ($tr == 0) {
    echo "<script>alert('Recipient address does not exist.');document.location='share_files.html';</script>";
} else {
    // Insert file sharing record
    $stmt = mysqli_prepare($con, "INSERT INTO file_shares (receiver_id, sender_id, file_path) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'sss', $toaddr, $fromaddr, $filePath);
    $success = mysqli_stmt_execute($stmt);

    if ($success) {
        echo "<script>alert('File shared successfully!');document.location='share_files.html';</script>";
    } else {
        echo "<script>alert('File sharing failed.');</script>";
    }
}
?>
