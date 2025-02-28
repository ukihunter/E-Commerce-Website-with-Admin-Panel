<div>
  <h3>User Messages</h3>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Name</th>
        <th class="text-center">Email</th>
        <th class="text-center">Message</th>
        <th class="text-center">Submitted At</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql = "SELECT * FROM messages"; // Query to fetch user messages
      $result = $conn->query($sql);
      $count = 1;
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["name"]?></td> <!-- Display user name -->
      <td><?=$row["email"]?></td> <!-- Display user email -->
      <td><?=$row["message"]?></td> <!-- Display message content -->
      <td><?=$row["submitted_at"]?></td> <!-- Display submission date -->
    </tr>
    <?php
            $count = $count + 1;
          }
        }
    ?>
  </table>
</div>
