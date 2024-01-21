<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
    <ul class="navbar-nav">

      <li class="nav-item dropdown">
        <button class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          Data
        </button>
        <ul class="dropdown-menu dropdown-menu-dark">
          <li>  
            <?php
            if(isset($_SESSION['key']) ){?>
            <a class="dropdown-item" href="./?tab=mixedtable">Table</a>
            <?php
            }else{
              ?>
               <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="dropdown-item">Table</a>
              <?php
            }
            ?>
          </li>
          <li>
          <?php
            if(isset($_SESSION['key']) ){?>
            <a class="dropdown-item" href="?tab=mixedgraphic">Graphical</a>
            <?php
            }else{
              ?>
               <a data-bs-toggle="modal" data-bs-target="#exampleModal2" class="dropdown-item">Graphical</a>
              <?php
            }
            ?>
          </li>
        </ul>
      </li>

      <li class="nav-item dropdown">
          <button class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Setting
          </button>
          <ul class="dropdown-menu dropdown-menu-dark">
          <?php
            if(isset($_SESSION['key']) ){?>
            <a class="dropdown-item" href="./auth/deletekey.php">Delete my key</a>
            <?php
            }else{
              ?>
               <li><a class="dropdown-item" href="?tab=setkey">Set my key</a></li>
              <?php
            }
            ?>
            <?php
            require 'config.php';
            $id = $_SESSION['id'];
            $sql2 = "SELECT token FROM `store_token` WHERE userId = '$id';";
            $result2 = $conn->query($sql2);
            
            if ($result2->num_rows > 0) {
              ?>
              <li><a class="dropdown-item" href=".\auth\destroy_token.php">Destroy Store Token</a></li>
              <?php
            }else{
              ?>
               <li><a class="dropdown-item" href=".\auth\generate_token.php">Generate Store Token</a></li>
              <?php
            }
            ?>
            
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
    </ul>
  </div>
</nav>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Insert Private key to decripts.</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="./?tab=mixedtable" method="post">
                      <input class="form-control" value="mixedtable" type="hidden" name="tab">
                      <div class="form-floating">
        <textarea name="key" class="form-control" placeholder="Leave a key here" id="floatingTextarea" style=" height: 300px;"></textarea>
        <label for="floatingTextarea">Private key</label>
      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
          </form>


                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel2">Insert Private key to decripts.</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal2" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="./?tab=mixedgraphic" method="post">
                      <input class="form-control" value="mixedgraphic" type="hidden" name="tab">
                      <div class="form-floating">
        <textarea name="key" class="form-control" placeholder="Leave a key here" id="floatingTextarea" style=" height: 300px;"></textarea>
        <label for="floatingTextarea">Private key</label>
      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
          </form>