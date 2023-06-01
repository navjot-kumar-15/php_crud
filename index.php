<?php 
require_once 'includes/header.php';

?>

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
<div class="main_table">
<div class="table_header_content">
    <div class="table_header_container">
        <div class="left">
        <a href="add.php" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#exampleModal">Add Task</a>
        </div>
        <div class="middle">
            <h1>Todo List</h1>
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
    // Reading the file
    $sql = 'select * from tasks';
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

<?php 
require 'includes/footer.php'

?>
 

 
