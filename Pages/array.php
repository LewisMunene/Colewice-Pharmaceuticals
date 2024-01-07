<?php
//This a indexed array
$fruits=array("Apple","Mango","Orange");
print_r($fruits);
echo "The first value is" .$fruits[0];

var_dump($fruits);
//This is a associative array
$age=[  
    "Joe"=>22,
    "Adam"=>25,
    "David"=>30
];
print_r($age);
$Age=array("Peter"=>"35","Lewis"=>"23","Claire"=>"20");
var_dump($Age);
print_r($Age);


//Looping indexed array
$arrlength=count($fruits);
for($x=0; $x<$arrlength; $x++){
echo $fruits[$x];
echo "<br>";

}

//looping an associative array
foreach($Age as $key=> $value){
echo "My Name is:" .$key. "And my age is:" .$value;
echo "<br>";

}

//This is a multidimensional array
$myarray=[
    ["Ankit","Ram","Shyam"],
    ["Unnao","Trichy","Kampur"]
];
    //Display the information
    print_r($myarray);

// looping a multidimensional array
$data=[
    "Game of Thrones"=>["Jaime Lannister","Catelyn Stark","Cersie Lannister"],
    "Black mirror"=>["Nanette Cole","Selma Telse","Karin Parke"]

];
echo "<br>";
echo "<h1>Famous Tv Series and Actors</h1>";
foreach($data as $series=>$actors){
    echo "<h2>$series</h2>";
    foreach($actors as $actor){
    echo "<div>$actor</div>";
    }
}

?>


