<?php
$students = [
    ['stdNo' => '20003', 'stdName' => 'Ahmed Ali', 'stdEmail' => 'ahmed@gmail.com', 'stdGAP' => 88.7], 
    ['stdNo' => '30304', 'stdName' => 'Mona Khalid', 'stdEmail' => 'mona@gmail.com', 'stdGAP' => 78.5],
    ['stdNo' => '10002', 'stdName' => 'Bilal Hmaza', 'stdEmail' => 'bilal@gmail.com', 'stdGAP' => 98.7],
    ['stdNo' => '10005', 'stdName' => 'Said Ali', 'stdEmail' => 'said@gmail.com', 'stdGAP' => 98.7],
    ['stdNo' => '10007', 'stdName' => 'Mohammed Ahmed', 'stdEmail' => 'mohamed@gmail.com', 'stdGAP' => 65.3]
];

// Sort students descending by GPA
usort($students, function($a, $b) {
    return $b['stdGAP'] <=> $a['stdGAP'];
});

$total = count($students);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Student Records</title>
<style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f7f9;
    color: #333;
    padding: 30px;
}

/* Gradient Text for Caption */
caption {
    font-size: 2em;
    font-weight: 700;
    margin-bottom: 20px;
    text-transform: uppercase;
    background: linear-gradient(90deg, #2ecc71, #3498db);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-align: center;
}

/* Table */
table {
    border-collapse: separate;
    border-spacing: 0 12px;
    width: 100%;
    max-width: 900px;
    margin: 0 auto 30px auto;
}

thead th {
    background-color: #2980b9;
    color: #fff;
    padding: 12px 15px;
    text-align: center;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    border-radius: 10px 10px 0 0;
}

tbody tr {
    background: #fff;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    transition: transform 0.2s, box-shadow 0.2s;
    border-radius: 8px;
    position: relative;
}

tbody tr:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 16px rgba(0,0,0,0.15);
}

td {
    padding: 12px 15px;
    text-align: center;
}

/* Hover effect on student names */
td:first-child:hover {
    color: #e74c3c;
    font-weight: 700;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
    cursor: pointer;
}

/* GPA Indicator Bar based on value */
tbody tr::after {
    content: "";
    display: block;
    height: 6px;
    border-radius: 0 0 8px 8px;
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
}

/* Color function for GPA */
<?php foreach ($students as $index => $stud): ?>
tbody tr:nth-child(<?= $index+1 ?>)::after {
    background: <?php
        if ($stud['stdGAP'] >= 90) echo '#2ecc71';     // Green
        elseif ($stud['stdGAP'] >= 75) echo '#f1c40f'; // Yellow
        else echo '#e74c3c';                           // Red
    ?>;
}
<?php endforeach; ?>

/* Total Box */
.total-box {
    width: 200px;
    margin: 0 auto;
    padding: 15px;
    text-align: center;
    font-size: 1.2em;
    font-weight: 600;
    background: linear-gradient(90deg, #2ecc71, #3498db);
    color: #fff;
    border-radius: 10px;
    transition: background-color 0.3s, transform 0.2s;
    cursor: pointer;
}

.total-box:hover {
    background: linear-gradient(90deg, #3498db, #2ecc71);
    transform: translateY(-3px);
}

@media (max-width: 600px) {
    th, td {
        font-size: 0.9em;
        padding: 8px;
    }
    .total-box {
        width: 150px;
        font-size: 1em;
        padding: 10px;
    }
}
</style>
</head>
<body>

<table>
    <caption>Student Records</caption>
    <thead>
        <tr>
            <th>Name</th>
            <th>Student ID</th>
            <th>Email</th>
            <th>GPA</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($students as $stud): ?>
            <tr>
                <td><?= htmlspecialchars($stud['stdName']) ?></td>
                <td><?= htmlspecialchars($stud['stdNo']) ?></td>
                <td><?= htmlspecialchars($stud['stdEmail']) ?></td>
                <td><?= number_format($stud['stdGAP'], 2) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="total-box">
    Total Students: <?= $total ?>
</div>

</body>
</html>
