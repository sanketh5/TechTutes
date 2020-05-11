<?php
session_start();
if(empty($_SESSION['email']))
{
     header('location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin View Admission</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="icon" href="../images/title-logo.png" type="image/png" sizes="32x32">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="../jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    
</head>

<body>
   <div class="container dashboard">
      <p class="text-light text-right">Little Hearts Play School</p>
       <h3 class="text-light text-right">ADMIN DASHBOARD</h3>
       <div class="row">
           <div class="col-lg-4" style="background-color: #c1c1c138">
           <center>
               <img src="img/world-icon.gif" class="img-fluid mb-5 mt-5 im-si">
               <h5 class="mb-4 text-light bg-info p-2" style="border-radius:20px;font-family: 'Didact Gothic', sans-serif;border: 1px solid white;">User : <?php echo $_SESSION['user']; ?></h5>
           </center>
            <div class="list-group">
                <a href="admin.php" class="list-group-item list-group-item-action"><i class="fas fa-user-circle"></i> Profile</a>
                <a href="add-notice.php" class="list-group-item list-group-item-action"><i class="fas fa-edit"></i> Add Notice</a>
                <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-plus-circle"></i> Add Events</a>
                <a href="view.admission.php" class="list-group-item list-group-item-action list-group-item-success"><i class="fas fa-users"></i> View Admission</a>
                <a href="view-contact.php" class="list-group-item list-group-item-action"><i class="fas fa-users"></i> View Contact</a>
                <a href="logout.php" class="list-group-item list-group-item-action list-group-item-danger"><i class="fas fa-power-off"></i> Log Out</a>
            </div>
           </div>
           <?php
           require_once "connection.php";
           $sql_query = "SELECT * FROM admission_tbl";
           $response = mysqli_query($con,$sql_query);
           $count = mysqli_num_rows($response);
           ?>
            <div class="col-lg-8 profile">
               <div class="view-admission">
                <h2 class="text-center mt-5 text-primary"><i class="fas fa-users"></i> View Admission</h2>
                <div class="table-responsive" style="width:100%;height:510px;margin-top:30px;">
                <table class="table table-hover table-striped table-bordered">
                    <thead class="bg-success text-light">
                        <tr>
                            <th>SNo.</th>
                            <th style="min-width:200px;"><i class="fas fa-user-tie"></i> Parent's Name</th>
                            <th style="min-width:200px;"><i class="fas fa-child"></i> Child's Name</th>
                            <th style="min-width:300px;"><i class="fas fa-envelope"></i> Parent's Email ID</th>
                            <th style="min-width:200px;"><i class="fas fa-phone-volume"></i> Phone Number </th>
                            <th style="min-width:200px;"><i class="fas fa-graduation-cap"></i> Class</th>
                            <th style="min-width:200px;"><i class="fas fa-book-reader"></i> Source</th>
                            <th style="min-width:100px;"><i class="fas fa-users-cog"></i> Action</th>
                        </tr>
                    </thead>
                    <tbody>
            <?php
            if($count > 0)
            {
                $i = 1;
                while($row = mysqli_fetch_assoc($response))
                {
            ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo ucwords($row['parent_name']); ?></td>
                            <td><?php echo ucwords($row['child_name']); ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['class']; ?></td>
                            <td><?php echo $row['source']; ?></td>
                             <td><a href="admission-delete.php?uid=<?php echo $row['id']; ?>"><i class="fas fa-trash"></i></a></td>
                        </tr>
        <?php
            $i++;
                }
            }
            else
            {
        ?>

                        <tr>
                            <td style="color:red;" colspan="8">No Record found in Your Memory...!</td>
                        </tr>
        <?php
            }
        ?>

                    </tbody>
                </table>
                   </div>
                
                </div>
                
            </div>
       </div>
   </div>

</body>

</html>