<?php
$page_title = 'Testing Hub';
include ('includes/theader.html');
require ('mysqli_connect.php');
?>


<?php if ($_SESSION["toggle"] == 1){ // SECURE CODES ?>

    <div class="flex-container">
        <h1>Kingdom Hearts Game Titles</h1>
  
        <?php

        if(isset($_POST["value"])){
            $search = $_POST["value"];
        } else {
            $search = "";
        }

        //define total number of results you want per page
        $rpage = 4;

        //find the total number of results stored in the database
        $q = "SELECT * FROM collections WHERE game_name LIKE '%$search%' ORDER BY collection_id";		
        $r = @mysqli_query ($dbc, $q);

        // Count the number of returned rows:
        $num = mysqli_num_rows($r);
        if ($num == 0) {
            echo '<p>No search found for "' . htmlspecialchars($search) .'".</p>';
            include ('includes/footer.html');
            exit();
            
        } else {
            echo '
            <p>Here are the list of Kingdom Hearts games that is available</p>
            <p>Sort by: Release Date</p>
            <br>
        <div class="flex-con">';
        }
        //determine the total number of pages available  
        $npage = ceil ($num/$rpage);

        //determine which page number visitor is currently on
        if (!isset ($_GET['page']) ) {  
            $page = 1;  
        } else {  
            $page = $_GET['page'];  
        }
        
        //determine the sql LIMIT starting number for the results on the displaying page  
        $firstpr = ($page-1) * $rpage;  
    
        //retrieve the selected results from database   
        $q1 = "SELECT *FROM collections WHERE game_name LIKE '%$search%' LIMIT " . $firstpr . ',' . $rpage;  
        $r1 = mysqli_query($dbc, $q1);  
        
        //display the retrieved result on the webpage  
        while ($row = mysqli_fetch_array($r1,  MYSQLI_ASSOC)) {  
            
            echo '
            <form action="collections.php" method="POST">
            <input type="hidden" name="gameid" value="-1">

            <a href=\'javascript:formSubmit('.$row['collection_id'].');\'>&nbsp;
            <div class="flex-container" style="width:35vh; height:19vh; justify-content:center;">
                <img src="'. $row['game_pic'] .'">
            </div><div class="flex-container" style="width:35vh; height:11vh; justify-content:flex-start;">
                <p class="browsebold">'. $row['game_name'] .'&nbsp;</p>
            </div><div class=flex-con>
                <p>See More ></p>
            </div></a>
            </form>

            <div class="flex-container">&emsp;</div>';
        }  

        echo '</div>
        <div class="flex-container">&emsp;</div> 

        <div class="flex-con">';

        //display the link of the pages in URL  
        for($page = 1; $page<= $npage; $page++) {  
            echo '<a href = "browse?page=' . $page . '">' . $page . ' </a>&emsp;';  
        }  

        echo '</div></div>';
} else { //INSECURE CODES ?>

    <div class="flex-container">
        <h1>Kingdom Hearts Game Titles</h1>
    
    <?php
    
    if(!empty($_GET["search"])){
        $search = $_GET["search"];
    } else {
        $search = "";
    }

    //define total number of results you want per page
    $rpage = 4;

    //find the total number of results stored in the database
    $q = "SELECT * FROM collections WHERE game_name LIKE '%$search%' ORDER BY collection_id";		
    $r = @mysqli_query ($dbc, $q);

    // Count the number of returned rows:
    $num = mysqli_num_rows($r);
    if ($num == 0) {
        echo '<p>No search found for "' . $search .'".</p>';
        include ('includes/footer.html');
        exit();
        
    } else {
        echo '
        <p>Here are the list of Kingdom Hearts games that is available</p>
        <p>Sort by: Release Date</p>
        <br>
    <div class="flex-con">';
    }
    //determine the total number of pages available  
    $npage = ceil ($num/$rpage);

    //determine which page number visitor is currently on
    if (!isset ($_GET['page']) ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];  
    }
    
    //determine the sql LIMIT starting number for the results on the displaying page  
    $firstpr = ($page-1) * $rpage;  

    //retrieve the selected results from database   
    $q1 = "SELECT *FROM collections WHERE game_name LIKE '%$search%' LIMIT " . $firstpr . ',' . $rpage;  
    $r1 = mysqli_query($dbc, $q1);  
    
    //display the retrieved result on the webpage  
    while ($row = mysqli_fetch_array($r1,  MYSQLI_ASSOC)) {  
        
        echo '
    

        <form action="collections.php" method="POST">
        <input type="hidden" name="gameid" value="-1">

        <a href=\'javascript:formSubmit('.$row['collection_id'].');\'>&nbsp;
        <div class="flex-container" style="width:35vh; height:19vh; justify-content:center;">
            <img src="'. $row['game_pic'] .'">
        </div><div class="flex-container" style="width:35vh; height:11vh; justify-content:flex-start;">
            <p class="browsebold">'. $row['game_name'] .'&nbsp;</p>
        </div><div class=flex-con>
            <p>See More ></p>
        </div></a>
        </form>

        <div class="flex-container">&emsp;</div>';
    }  

    echo '</div>
    <div class="flex-container">&emsp;</div> 

    <div class="flex-con">';

    //display the link of the pages in URL  
    for($page = 1; $page<= $npage; $page++) {  
        echo '<a href = "browse?page=' . $page . '">' . $page . ' </a>&emsp;';  
    }  

    echo '</div></div>';
} ?>

<?php include ('includes/footer.html'); ?>
</div>