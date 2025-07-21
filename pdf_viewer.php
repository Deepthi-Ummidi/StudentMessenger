<?php
session_start();
$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "a310");

$user = $_SESSION['username'];

// Queries for PDFs sent and received by the user
$receivedQuery = "SELECT sender_id, file_path, shared_at FROM file_shares WHERE receiver_id = '$user' AND file_path LIKE '%.pdf' ORDER BY shared_at DESC";
$receivedResult = mysqli_query($con, $receivedQuery);

$sentQuery = "SELECT receiver_id, file_path, shared_at FROM file_shares WHERE sender_id = '$user' AND file_path LIKE '%.pdf' ORDER BY shared_at DESC";
$sentResult = mysqli_query($con, $sentQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Viewer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }
        h2, h3 {
            color: #333;
        }
    </style>
</head>
<body>
    <h2>PDFs Sent and Received</h2>

    <h3>PDFs You Received</h3>
    <table>
        <tr>
            <th>Sender</th>
            <th>File</th>
            <th>Date Received</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($receivedResult)): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['sender_id']); ?></td>
                <td><a href="<?php echo htmlspecialchars($row['file_path']); ?>" target="_blank">View PDF</a></td>
                <td><?php echo htmlspecialchars($row['shared_at']); ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h3>PDFs You Sent</h3>
    <table>
        <tr>
            <th>Receiver</th>
            <th>File</th>
            <th>Date Sent</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($sentResult)): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['receiver_id']); ?></td>
                <td><a href="<?php echo htmlspecialchars($row['file_path']); ?>" target="_blank">View PDF</a></td>
                <td><?php echo htmlspecialchars($row['shared_at']); ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
