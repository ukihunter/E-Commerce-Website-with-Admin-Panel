<div>
  <h2>All Users</h2>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Name</th>
        <th class="text-center">Email</th>
        <th class="text-center">Role</th>
        <th class="text-center">Joining Date</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";

      // Query to fetch user data where role is not 'admin'
      $sql = "SELECT * FROM user WHERE role != 'admin'"; // Modify based on your table name if necessary
      $result = $conn->query($sql);
      $count = 1;

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["name"]?></td>
      <td><?=$row["email"]?></td>
      <td><?=$row["role"]?></td>
      <td><?=$row["created_at"]?></td>
    </tr>
    <?php
            $count++;
        }
      }
    ?>
  </table>
</div>