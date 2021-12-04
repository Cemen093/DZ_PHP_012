<?php
//phpinfo(INFO_MODULES);

$mysql_conn = new mysqli("127.0.0.1:3306",
    "root",
    "qwerty123",
    "bd_electronics_store");
if($mysql_conn->connect_errno){
    echo "<p>Connection FAIL by ".$mysql_conn->connect_error."</p>";
    http_response_code(400);
}
else {
    echo "<p>CONNECTION OK</p>";
//          INSERT STAT
//    $mysql_conn->query("INSERT INTO country(nameCountry) VALUES ('Afghanistan'),('Albania'),('Algeria'),('Andorra');");
//    $mysql_conn->query("INSERT INTO city(nameCity) VALUES ('Kyiv'),('Kharkiv'),('Odesa'),('Dnipro');");
//    $a1 = $mysql_conn->query("Select * from country where nameCountry='Afghanistan'")->fetch_assoc()['idCountry'];
//    $a2 = $mysql_conn->query("Select * from country where nameCountry='Albania'")->fetch_assoc()['idCountry'];
//    $b1 = $mysql_conn->query("Select * from city where nameCity='Kyiv'")->fetch_assoc()['idCity'];
//    $b2 = $mysql_conn->query("Select * from city where nameCity='Kharkiv'")->fetch_assoc()['idCity'];
//    $result = $mysql_conn->query("INSERT INTO manufacturer(name,Country_idCountry, City_idCity) VALUES ('Manufacturer_1',".$a1.",".$b1."),('Manufacturer_2',".$a2.",".$b2.");");
//    $mysql_conn->query("INSERT INTO category(nameCategory) VALUES ('smartphones'),('telephones'),('appliances');");
//    $a1 = $mysql_conn->query("Select * from category where nameCategory='smartphones'")->fetch_assoc()['idCategory'];
//    $a2 = $mysql_conn->query("Select * from category where nameCategory='telephones'")->fetch_assoc()['idCategory'];
//    $b1 = $mysql_conn->query("Select * from manufacturer where name='Manufacturer_1'")->fetch_assoc()['idManufacturer'];
//    $b2 = $mysql_conn->query("Select * from manufacturer where name='Manufacturer_2'")->fetch_assoc()['idManufacturer'];
//    $mysql_conn->query("INSERT INTO product(nameProduct, Price,Category_idCategory,Manufacturer_idManufacturer) VALUES ('iphone 0.1',4,".$a1.",".$b1."),('phone 2021',30,".$a1.",".$b1.");");

//          SELECT STAT
    $result = $mysql_conn->query("SELECT * FROM product;");
    echo '<h2>Products</h2>';
    while ($row = $result->fetch_assoc()){
        echo '<p>Name:'.$row['nameProduct'].';Price:'.$row['Price'].';'.
            $mysql_conn->query("SELECT * FROM category WHERE idCategory=".$row['Category_idCategory'].";")->fetch_assoc()['idCategory'].
            ';Manufacturer:'.
            $mysql_conn->query("SELECT * FROM manufacturer WHERE idManufacturer=".$row['Manufacturer_idManufacturer'].";")->fetch_assoc()['name'].
            ';</p>';
    }

}
$mysql_conn->close();
?>