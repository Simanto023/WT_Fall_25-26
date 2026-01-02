<?php
include __DIR__ . "/DB/db.php";

$categoryError = "";
$categories = [];
$sql="SELECT * FROM categories";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
}
if (isset($_GET["error"])) {
    $categoryError = "Category name is required";
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Manage Categories | NG Auto</title>
    <link rel="stylesheet" href="css/manage_category.css">
</head>
<script src="js/manage_category.js">
</script>
<body>
<header>
    <div class="topbar">
        <div class="brand">
            <img src="images/logo.png" alt="NG Auto">
            <span>NG AUTO</span>
        </div>

        <a href="admin_dashboard.html" class="back">← Back to Dashboard</a>
    </div>
</header>

<main>
    <div class="page-header">
        <h2>Manage Categories</h2>
        <button type="button" onclick="toggleForm()">+ Add New Category</button>
    </div>
    <table>
        <thead>
            <tr>
                <th>Category Name</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php
foreach ($categories as $cat) {
    echo "<tr>";
    echo "<td>{$cat['name']}</td>";
    echo "<td>
            <button class='delete' onclick='deleteCategory({$cat['id']})'>Delete</button>
          </td>";
    echo "</tr>";
}
?>
        </tbody>
    </table>
    <form method="post" action="PHP/add_category.php">
        <h3>Add Category</h3>

        <div class="form-group">
            <label>Category Name</label>
            <input type="text" name="category_name" placeholder="e.g. SUV, Sedan">
        </div>

        <div class="form-actions">
            <button type="submit" class="save">Save</button>
            <button type="button" class="cancel" onclick="toggleForm()">Cancel</button>
        </div>
         <?php
if (!empty($categoryError)) {
    echo "<ul style='color:red; font-size:12px; margin-top:8px'>";
    echo "<li>$categoryError</li>";
    echo "</ul>";
}
?>
    </form>

</main>



</body>
</html>
