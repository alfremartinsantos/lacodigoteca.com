<?php
function descargarFichero($url, $filename){
    $ch = curl_init ();  
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST, 'GET');  
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);  
    curl_setopt($ch,CURLOPT_URL, $url);  
 
    ob_start();  
    curl_exec($ch);  
    $return_content=ob_get_contents();  
    ob_end_clean();  
       
    $return_code=curl_getinfo($ch,CURLINFO_HTTP_CODE);  
    $fp= @fopen($filename,"a"); 
    fwrite($fp,$return_content); 

    return true; 
}

$url = "https://lacodigoteca.com/wp-content/uploads/2020/04/LOGO-Codigoteca-oscuro.png";
$filename = $_SERVER["DOCUMENT_ROOT"].'/lacodigoteca_en_tu_web.png';

descargarFichero($url,$filename);  

?>