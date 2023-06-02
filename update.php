<?php 
require_once 'includes/header.php';
require_once 'includes/db.php';

$id = "";
$name = "";
$lastname = "";
$email = "";

if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(!isset($_GET['id'])){
        header("location:index.php");
        exit;
    }
    $id = $_GET['id'];
    $sql = "select * from tasks where id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    while(!$row){
        header("location:index.php");
        exit;
    }

    $name = $row['name'];
    $lastname = $row['lastname'];
    $email = $row['email'];

}else{

        $id = $_POST["id"];
        $name = $_POST["name"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
    
        $sql = "update tasks set name='$name', lastname='$lastname', email='$email' where id='$id'";
        $result = $conn->query($sql);
        if($result){
            header("location:index.php");
            exit;
        }
}
?>
       <style>

        .update_form_container{
          width: 40vw;
          padding: 2rem 1rem 2rem 1rem;
          border-radius: 1rem;
          box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }
        .update_form_container  input{
          border: none;
          border-bottom: 1px solid lightgrey;
          outline:none;
        }
        .update_form_container  .form-label{
          font-size: 1.2rem;
          font-weight: bold;
          letter-spacing: .1rem;
        }
        .update_btn{
          width:100%;
        }
       </style>  
<form method="post" class="d-flex  justify-content-center align-items-center
 flex-column update_form" style="margin-top:5rem;" >
 <div class="update_form_container">
    <h2 class="text-center">Update it</h2>
  <div class="mb-3">
  <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control"> <br>
    <label for="Name" class="form-label ">Name</label>
    <input type="text" class="form-control" id="Name" name="name" value="<?php echo $name;?>" autofocus >
  </div>
  <div class="mb-3">
    <label for="lastname" class="form-label">Lastname</label>
    <input type="text" name="lastname" class="form-control" id="lastname" value="<?php echo $lastname;?>">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" name="email" class="form-control"
    value="<?php echo $email;?>" id="email">
  </div>

  <button type="submit" name="submit" class="btn btn-primary update_btn">Update</button>
  </div>
</form>
   </body>
</html>
    
<?php  
require_once 'includes/footer.php';
?>