<?php 
require_once 'includes/header.php';



?>


<style>
.pagination_container{
  width: 100%;
  position: absolute;
  top: 90%;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 1.1rem;

}

</style>

 <!-- Modal  -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel" class="text-center">Add Task</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="add.php">
            <input type="text" class="w-100 modal_input" placeholder="Enter you Name" name="name" autofocus>
    
            <input type="text" class="w-100 modal_input" name="lastname" placeholder="Enter you Last name" >
    
            <input type="email" class="w-100 modal_input" name="email" placeholder="Enter you Email" >
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Add task</button>
          </div>
        </form>
    </div>
  </div>
</div>

<!-- Table  -->
<div class="main_table">
<div class="table_header_content">
    <div class="table_header_container">
        <div class="left">
        <a href="add.php" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#exampleModal">Add Task</a>
        </div>
        <div class="middle">
            <h1>User List</h1>
        </div>
        <div class="right "> 
            <button type="button" class="btn btn-secondary">Print</button>
        </div>
    </div>
</div>

    <div class="main_sub_table">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Option's</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php   
//     Adding the pagination here ------->>>>
    $limit = 7;

    if(isset($_GET['page'])){
      $page = $_GET['page'];
    }else{
      $page = 1;
    }
    $offset = ($page-1) * $limit;

    //     Fetching the data from the database--->>>>
    $sql = "select * from `tasks` LIMIT {$offset}, {$limit}";

     $rows = $conn->query($sql);
     if(!$rows){
      die("Invalid query");
     }
    while($row = $rows->fetch_assoc()):?>

    <th scope="row"><?php echo $row['id'];?></th>
    <td><?php echo $row['name'];?></td>
    <td><?php echo $row['lastname'];?></td>
    <td><?php echo $row['email'];?></td>
    <?php 
    echo "
    <td class='icons'>
      <a href='delete.php?id=$row[id]'><i class='fa-sharp fa-solid fa-delete-left'></i></a>
    
    <a href='update.php?id=$row[id]'><i class='fa-solid fa-pen-to-square' data-bs-toggle='modal' data-bs-target='#exampleModal2'></i></a>
</td>
    ";
    ?>
</tr>
<?php endwhile?>
    
  </tbody>
</table>
    </div>
</div>

<!-- Pagination  -->
<?php 

$pagination = "SELECT * FROM `tasks` WHERE 1 ";

$result1 = mysqli_query($conn,$pagination) or die("<script>alert('Server is down')</script>") ; 

if(mysqli_num_rows($result1) > 0){

$total_records = mysqli_num_rows($result1);
$total_page = ceil($total_records /$limit);
?>

<div class="pagination pagination_container">
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php for($i=1;$i<=$total_page;$i++){ ?>
    <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i;?></a></li>
<?php } ?>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
</div>
<?php }?>


<?php 
require 'includes/footer.php'

?>
 

 
