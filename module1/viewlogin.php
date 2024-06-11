<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Vehicle Information</title>

echo "<table class='table table-striped'>
<tr>
<th>ID</th>
<th>User ID</th>
<th>Password</th>
<th>Actions</th>
</tr>";

while($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>{$row['id']}</td>
    <td>{$row['user_id']}</td>
    <td>{$row['user_pw']}</td>
    <td>
        <a href='edit.php?id={$row['id']}' class='btn btn-primary btn-sm'>Edit</a>
        <a href='?delete={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
    </td>
    </tr>";
}

echo "</table>";

                      // Close the statement and connection
                      $stmt->close();
                      $conn->close();

                    
                  }