<?php    

    if (empty($_POST['file'])){
     echo "resume is not received";
    }        
    $fname = $_POST['file'];

    $target_url = 'http://104.155.168.93/Project/resume/upload/'.$fname; 
    $fname = 'uploads/'.$fname;
    $cfile = new CURLFile(realpath($fname));

        $post = array (
                  'file' => $cfile
                  );    

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $target_url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");   
    curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type: multipart/form-data'));
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);   
    curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);  
    curl_setopt($ch, CURLOPT_TIMEOUT, 100);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

    $result = curl_exec ($ch);
    $json_file = preg_replace("/\.[^.]+$/", "", $fname).'.json';
    $result = json_decode($result, true);
    $result = $result["data"];
    $result = json_encode($result, true);
    $fp = fopen($json_file, 'w');
    fwrite($fp, $result);
    fclose($fp);

    if ($result === FALSE) {
        echo "Error sending" . $fname .  " " . curl_error($ch);
        curl_close ($ch);
    }else{
        curl_close ($ch);
        echo  $result;
    } 
?>
