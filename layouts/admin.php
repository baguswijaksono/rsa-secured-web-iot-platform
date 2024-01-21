<?php
require 'config.php';
$sql = "SELECT * FROM users;";
$result = $conn->query($sql);
if (isset($_SESSION['id'])) {
  $sqlrolecheck = "SELECT * FROM users WHERE id = '".$_SESSION['id']."'";
  $resultrolecheck = $conn->query($sqlrolecheck);

  // Retrieve the role value from the result
  $role = '';
  if ($resultrolecheck->num_rows > 0) {
    $row = $resultrolecheck->fetch_assoc();
    $role = $row['role'];
    if ($role == 'admin') {
      ?>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Token</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($result->num_rows > 0) {
            // Iterate over each row of the result
            while ($row = $result->fetch_assoc()) {
              // Retrieve store_token data for the user
              $storeTokenQuery = "SELECT * FROM store_token WHERE userId = '" . $row["id"] . "'";
              $storeTokenResult = $conn->query($storeTokenQuery);
              ?>
              <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["username"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["role"]; ?></td>
                <?php
                if ($storeTokenResult->num_rows > 0) {
                  while ($storeTokenRow = $storeTokenResult->fetch_assoc()) {
                    ?>
                    <td>
                      <?php echo $storeTokenRow["token"]; ?>
                    </td>
                    <td>
                      <?php if ($storeTokenRow["status"] == 0) { ?>
                        <?php if ($role == "admin") { ?>
                          <form action=".\auth\authorization.php" method="post">
                            <input type="hidden" name="userId" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="btn btn-primary">Authorize</button>
                          </form>
                        <?php } else { ?>
                          <button type="button" class="btn btn-primary" disabled>Authorize</button>
                        <?php } ?>
                      <?php } else { ?>
                        <?php if ($role == "admin") { ?>
                          <form action=".\auth\prohibit.php" method="post">
                            <input type="hidden" name="userId" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="btn btn-danger">Prohibit</button>
                          </form>
                        <?php } else { ?>
                          <button type="button" class="btn btn-danger" disabled>Prohibit</button>
                        <?php } ?>
                      <?php } ?>
                    </td>
                    <?php
                  }
                } else {
                  echo "<td colspan='2'>No store tokens found for this user.</td>";
                }
                ?>
              </tr>
              <?php
            }
          } else {
            // Handle case when no rows are returned
            ?>
            <tr>
              <td colspan="6">No users found.</td>
            </tr>
            <?php
          }
          ?>
        </tbody>
      </table>
      <?php
    }
  }
}
?>
