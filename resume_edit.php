<?php
$path = "uploads/";
$files = scandir($path);
//echo var_dump($files);
$allowed = ["html", "htm", "txt", "docx", "doc", "pdf"]; 
$max = 0;
foreach ($files as &$value) {
    $ext = strtolower(end(explode('.', $value)));
    if(in_array($ext, $allowed)){
    $filename = preg_replace("/\.[^.]+$/", "", $value);
    $temp = "";
    for($x = 0; $x<=strlen($filename); $x++){
        
        if ($filename[$x] == '_'){
            break;
        }
        else
            $temp =$temp.(string)$filename[$x];
    }
    if ((int)$temp >= $max)
        {
            $max = (int)$temp;
            $json_file = 'uploads/'.$filename.'.json';
        }
    }

}

$data = file_get_contents ($json_file);
$json = json_decode($data, true);
$json_data = $json["data"];

$json_data["basics"]["name"]["firstName"] = $_POST["firstname"];
$json_data["basics"]["name"]["surname"] = $_POST["surname"];
$json_data["basics"]["email"] = array($_POST["email"]);
$json_data["basics"]["phone"] = array($_POST["phone"]);
$json_data["basics"]["address"] = array($_POST["address"]);
$skills = array();
for ($x=1; $x<=10; $x++)
{
    array_push($skills, $_POST["skill".$x]);
}
$pskills = array();
for ($x=1; $x<=10; $x++)
{
    array_push($pskills, $_POST["pskill".$x]);
}
$json_data["skills"] =array($skills, $pskills);


$interest = array();
for ($x=1; $x<=5; $x++)
{
    array_push($interest, $_POST["interest".$x]);
}
$hobbies = array();
for ($x=1; $x<=5; $x++)
{
    array_push($hobbies, $_POST["hobbies".$x]);
}
$json_data["misc"] =array($interest, $hobbies);

for ($x=1; $x<=6; $x++)
{
    $json_data["work_experience"][$x-1]["date_start"] =  $_POST["date_start".$x];
    $json_data["work_experience"][$x-1]["date_end"] =  $_POST["date_end".$x];
    $json_data["work_experience"][$x-1]["organization"] =  $_POST["organization".$x];
    $json_data["work_experience"][$x-1]["jobtitle"] =  $_POST["jobtitle".$x];
    $json_data["work_experience"][$x-1]["text"] =  $_POST["text".$x];
}

for ($x=1; $x<=4; $x++)
{
    $json_data["education"][$x-1]["date_start"] =  $_POST["edate_start".$x];
    $json_data["education"][$x-1]["date_end"] =  $_POST["edate_end".$x];
    $json_data["education"][$x-1]["organization"] =  $_POST["organization".$x];
    $json_data["education"][$x-1]["edutitle"] =  $_POST["edutitle".$x];
    $json_data["education"][$x-1]["text"] =  $_POST["etext".$x];
}



$result = json_encode($json_data, true);
$fp = fopen($json_file, 'w');
    fwrite($fp, $result);
    fclose($fp);

echo "edit successfullly"
?>
