<?php
session_start();

if (!isset($_SESSION['feedbacks'])) {
    $_SESSION['feedbacks'] = array();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $feedback = array(
        'fullname' => $_POST['fullname'],
        'department' => $_POST['department'],
        'gender' => $_POST['gender'],
        'feedback' => $_POST['feedback'],
        'date' => date('Y-m-d H:i:s')
    );
    
    $_SESSION['feedbacks'][] = $feedback;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Feedback Results</title>
    <style>
        body {
            font-family: Arial;
            margin: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .back-btn {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h2>Submitted Feedbacks</h2>
    
    <?php if (empty($_SESSION['feedbacks'])): ?>
        <p>No feedbacks submitted yet.</p>
    <?php else: ?>
        <table>
            <tr>
                <th>Name</th>
                <th>Department</th>
                <th>Gender</th>
                <th>Feedback</th>
                <th>Date Submitted</th>
            </tr>
            <?php foreach ($_SESSION['feedbacks'] as $entry): ?>
                <tr>
                    <td><?php echo htmlspecialchars($entry['fullname']); ?></td>
                    <td><?php echo htmlspecialchars($entry['department']); ?></td>
                    <td><?php echo htmlspecialchars($entry['gender']); ?></td>
                    <td><?php echo htmlspecialchars($entry['feedback']); ?></td>
                    <td><?php echo htmlspecialchars($entry['date']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    
    <div class="back-btn">
        <a href="index.html">BACK</a>
    </div>
</body>
</html> 