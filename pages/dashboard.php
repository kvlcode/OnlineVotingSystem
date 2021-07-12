<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location:../");
    }

    $userdata = $_SESSION['userdata'];
    $groupsdata = $_SESSION['groupsdata'];

    if($_SESSION['userdata']['status']==0){
        $status = '<p style ="color:red; font-size:20px; margin-top:-35px; margin-left:-180px;">Not Voted</p>';
    }
    else{
        $status = '<p style ="color:green; font-size:20px; margin-top:-35px; margin-left:-180px;">Voted</p>';
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
    <link href="../style.css" rel="stylesheet" id="bootstrap-css">
    <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
    <!-- <script src="lgin.js"></script> -->
    <!------ Include the above in your HEAD tag ---------->
  
    <title>Dashboard</title>

</head>
<body>
    
    <section style="height: 100vh;">
        <div style=" background-attachment: fixed; background-size: cover; width: 100%; height: 100vh; position: relative;">
            
            <div class="baslik">
                <a class="bl" href="../"><button id="backbtn">Back</button></a>
                <a class="bl" href="logout.php"><button id="logoutbtn">Logout</button></a> 
                <b style="font-size: 50px; text-align: center; margin-bottom: 15px; display: block;">Online Voting System</button>
                <hr style="border: 1px solid rgb(19, 18, 18);">
                
            </div>
            
                
            <div class="prof">
                <img style ="margin-top: 20px;" src="../upload/<?php echo $userdata['photo'] ?>" height="150" width="150">
                
                <p class="in">Name: <?php echo $userdata['name'] ?></p>
                <p class="in">Mobile: <?php echo $userdata['mobile'] ?></p>
                <p class="in">Status:<?php echo $status ?></p>

            </div>

            <div class="grp">
                <?php

                    if($_SESSION['groupsdata']){

                        for($i=0; $i<count($groupsdata); $i++){
                            ?>
                        
                            <div>
                                <img style="float:right; margin-right:20px;" src="../upload/<?php echo $groupsdata[$i]['photo'] ?>" height="110" width="100">
                                <p class="ing">Group Name: <?php echo $groupsdata[$i]['name'] ?></p>
                                <p class="ing">Votes: <?php echo $groupsdata[$i]['votes'] ?></p>
                                <form action="../back/vote.php" method="POST">
                                    <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>" >
                                    <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>" >
                                    <?php
                                        
                                        if($_SESSION['userdata']['status']==0){
                                            ?>      
                                                <input type="submit" name="votebtn" value="Vote" id="votebtn">
                                                
                                            <?php
                                            
                                            }
                                            else{

                                             ?>
                                                <button disabled type="button" name="votebtn" value="Vote" id="votedbtn">Voted</button>
                                                <?php      
                                            }
                                           ?> 

                                </form>
                            </div>
                            <br><br><br>

                            <hr style="border: 1px solid;">
                              <?php               
                        
                        }

                    }
                    else{

                    
                    }

                ?>       
                            
            </div>
                
            <br>
        
        </div>
    </section>
    <span class="spn3" >Developed by <a class="spn2" href="https://www.linkedin.com/in/kaval-prajapati-0b4817210" style="text-decoration: none;">KAVAL</a></span>
        
</body>
</html>