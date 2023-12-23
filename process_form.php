<?php
$serverName = "OmersMachine\SQLEXPRESS";
$databaseName = "final";

try {
    // Create a PDO instance
    $pdo = new PDO("sqlsrv:Server=$serverName;Database=$databaseName", null, null);
    echo "Connected successfully<br>";
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Process form data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $societyID = 2;
        $categoryID = 1;
        $societyName = $_POST["societyName"];
        $membershipFee = $_POST["membershipFee"];
        $category = $_POST["category"];
        $societyDescription = $_POST["societyDescription"];

        // SQL query to insert data into the Society table
        $sql = "INSERT INTO Society (SocietyID, SocietyName, MembershipFee, CategoryID, SocietyDescription) VALUES (?, ?, ?, ?, ?)";
        $params = array($societyID, $societyName, $membershipFee, $categoryID, $societyDescription);

        // Prepare and execute the query
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

        // Redirect to a success page or perform any other actions
        header("Location: success.php");
        exit();
    }

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
