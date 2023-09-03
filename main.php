<?php
include 'db.php';
$regulation;
$roll;
$gpa;
$showModal = false;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $Ename = $_POST['exam'];
    $Regulation = $_POST['regulation'];
    $Roll = $_POST['roll'];

    $sql = "SELECT * FROM `results` WHERE `roll` = '$Roll'";
    $result = mysqli_query($conn,$sql); 
    $num = mysqli_num_rows($result);

    if($num == 1){
        $row = mysqli_fetch_assoc($result);
        global $regulation;
        global $roll;
        global $gpa;
        $regulation = $row['regulation'];
        $roll = $row['roll'];
        $gpa = $row['gpa'];
        $showModal = true;
    }

}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">BTEB Result</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
         </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <h2 class="text-center mb-3">BTEB Results</h2>
                <form action="main.php" method="post">
                    <select name="exam" id="exam" class="form-select form-select-lg mb-3" aria-label="Large select example">
                    <option selected>Exam</option>
                    <option value="1">Diploma In Engineering</option>
                    <option value="2">Diploma In Textile</option>
                    <option value="3">Diploma In Agriculture</option>
                    </select>
                    <select name="regulation" id="regulation" class="form-select form-select-lg mb-3" aria-label="Large select example">
                    <option selected>Regulation</option>
                    <option value="1">2022</option>
                    <option value="2">2016</option>
                    <option value="3">2010</option>
                    </select>
                    <div class="mb-3">
                        <input type="number" class="form-control" name="roll" id="roll" aria-describedby="emailHelp" placeholder="Roll Number*">
                </div>
                <button type="submit" class="btn btn-primary w-100">View Result</button>
                </form>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
    <?php
    if($showModal){
        echo '
        <div class="container text-center mt-4">
            <div class="row">
                <div class="con-lg-3"></div>
                <div class="con-lg-6">

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>
                    Regualtion: '. $regulation .'<br>
                    Roll: '. $roll .'<br>
                    GPA:  '.$gpa.'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                </div>
                <div class="con-lg-3"></div>
            </div>
        </div>
        ';
    }
        
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>


