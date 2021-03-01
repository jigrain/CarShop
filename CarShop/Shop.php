<?php

if(isset($_GET["sub"])){
    if(isset($_GET["option1"])) {
        setcookie("value1", 1);
    }
}

if(isset($_GET["del"])){

    setcookie("value1", '',time()-3600,"/");

}
include_once "Header.php";
include_once "Core\ProductCatalog\Catalog.php";
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet"  href="CSS/ProductCatalog.css">
    <link rel="shortcut icon" href="https://img.icons8.com/color/32/000000/car--v1.png" type="image/png">
</head>
<body>





<form method="get" class="FilterForm">
<h3 class="HeadBySearch">Search by name</h3>
<input type="text" name="option1" class="SearchInput" placeholder="Search">
    <button type="submit" name="sub" class="SearchButton">Search</button>
    <button type="submit" name="del" class="UnFilterButton">Clear all filters</button>
<h3 class="HeadBySearch">Search by prise</h3>
    <input type="text" name="option1" class="ValueMin" placeholder="Min">
    <input type="text" name="option1" class="ValueMax" placeholder="Max">
    <h3 class="HeadBySearch HeadByTag">Search by tag</h3>

</form>








</body>