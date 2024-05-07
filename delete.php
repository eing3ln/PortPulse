<?php
// Process delete operation after confirmation
if(isset($_POST["ID"]) && !empty($_POST["ID"])){
    // Include config file
    require_once "connectdB-crudProfile.php";
    
    // Prepare a delete statement
    $sql = "DELETE FROM register WHERE ID = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_ID);
        
        // Set parameters
        $param_ID = trim($_POST["ID"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            
            // Records deleted successfully. Redirect to landing page
            header("location: crud-index.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
    
} else{
    // Check existence of ID parameter
    if(empty(trim($_GET["ID"]))){
        // URL doesn't contain ID parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .dashboard{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Delete Record</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger">
                            <input type="hidden" name="ID" value="<?php echo trim($_GET["ID"]); ?>"/>
                            <p>Are you sure you want to delete this record?</p>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="crud-index.php" class="btn btn-secondary">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
