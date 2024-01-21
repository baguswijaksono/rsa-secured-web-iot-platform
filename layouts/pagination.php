<?php
    $lastSegment = $page; 
    $next = $lastSegment + 1;
    $next2 = $lastSegment + 2;
    $prev = $lastSegment - 1;
    $prev2 = $lastSegment - 2;
?>

<div class="p-2"></div>
<?php
if($lastSegment==1){
?>
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <li class="page-item disabled">
        <a class="page-link">Previous</a>
      </li>
      <li class="page-item active"><a class="page-link" href="#"><?php echo $lastSegment; ?></a></li>
      <li class="page-item"><a class="page-link" href=""><?php echo $next; ?></a></li>
      <li class="page-item"><a class="page-link" href=""><?php echo $next2; ?></a></li>
      <li class="page-item">
        <a class="page-link" href="">Next</a>
      </li>
    </ul>
  </nav>

<?php
}
elseif($lastSegment > 2){
  ?>
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <li class="page-item">
        <a class="page-link" href="">Previous</a>
      </li>
      <li class="page-item"><a class="page-link" href=""><?php echo $prev2; ?></a></li>
      <li class="page-item"><a class="page-link" href=""><?php echo $prev; ?></a></li>
      <li class="page-item active"><a class="page-link" href="#"><?php echo $lastSegment; ?></a></li>
      <li class="page-item"><a class="page-link" href=""><?php echo $next; ?></a></li>
      <li class="page-item"><a class="page-link" href=""><?php echo $next2; ?></a></li>
      <li class="page-item">
        <a class="page-link" href="">Next</a>
      </li>
    </ul>
  </nav>
<?php
}

  elseif($lastSegment > 1){

    ?>
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <li class="page-item">
        <a class="page-link" href="">Previous</a>
      </li>
      <li class="page-item"><a class="page-link" href=""><?php echo $prev; ?></a></li>
      <li class="page-item active"><a class="page-link" href="#"><?php echo $lastSegment; ?></a></li>
      <li class="page-item"><a class="page-link" href=""><?php echo $next; ?></a></li>
      <li class="page-item"><a class="page-link" href=""><?php echo $next2; ?></a></li>
      <li class="page-item">
        <a class="page-link" href="">Next</a>
      </li>
    </ul>
  </nav>
<?php
  }
?>
