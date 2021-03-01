<?php
require_once 'Core/User/Con_db.php';

$results_per_page = 5;
$sql = "SELECT * FROM car";
$result = mysqli_query($connect,$sql);
$number_of_results = 0;


while($row = mysqli_fetch_array($result)){
    if( $_COOKIE["value1"]==1) {
        if($row['price']==1) {
            $number_of_results =+ 1;
        }
    }else{
        $number_of_results = mysqli_num_rows($result);
    }
}

$number_of_pages = ceil($number_of_results/$results_per_page);
if( $_COOKIE["value1"]==1) {

    $number_of_pages += 1;

}


if(!isset($_GET['page'])){
    $page = 1;
}else {
    $page = $_GET['page'];
}


$this_page_first_result = ($page-1)*$results_per_page;


$sql = "SELECT * FROM car LIMIT " . $this_page_first_result . ',' . $results_per_page;
$result = mysqli_query($connect,$sql);
?>

<div class="ProductCatalog">
<?php
while($row = mysqli_fetch_array($result)){
    PrintProduct($row);
}
?>
</div>

    <?php function PrintProduct($towarInfo){ ?>
    <div class="Towar">
        <div class="ProductImg"></div>

        <div class="ProductInfo">
            <div class="ProductName"><p><?php echo$towarInfo['name']; ?></p></div>
            <p class="ProductText"><?php echo$towarInfo['description']; ?></p>
        </div>
        <div class="ProductPrice"><p><?php echo$towarInfo['price'].' грн'; ?></p></div>
        <div class="User">
            <img  src="https://img.icons8.com/material-sharp/30/000000/user-male-circle.png"/>
            <p><?php echo$towarInfo['owner']; ?></p>
        </div>
        <div class="Chat"><a>Star the chat with owner?</a></div>
        <div class="ProductPrice Beloved "><p>Beloved? </p> </div>
    </div>
    <?php } ?>


<form class='PagePanel' metod="post">
    <?php if($page!=1){ ?>
    <a class='PrevButton' href="http://CarShop/Shop.php?page=<?php echo$page-1; ?>">Prev</a>
    <?php }else echo'<a class=\'PrevButton\'>Prev</a>'; ?>
    <div class='PageNumber'>
        <a><?php echo $_GET["page"]?></a>
        <a>/ <?php echo $number_of_pages?></a>
    </div>
    <?php if($page!=$number_of_pages){ ?>
    <a class='NextButton' href="http://CarShop/Shop.php?page=<?php echo$page+1; ?>">Next</a>
    <?php }else echo'<a class=\'NextButton\'>Next</a>'; ?>
</form>


