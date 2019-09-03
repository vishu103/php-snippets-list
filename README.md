# Introduction

This a well curated list of very useful php snippets which can help you in your projects. You can use these in a collective class or individually. I will try to add more snippets daily or weekly.

## Details
1. fun.php - Contains 21 function
2. printingPOSTnGET.php - Printing all the GET and POST variables.

**Here's the list of function available (Total - 21)**

### Generate Random String
```php
function generate_rand($len){
	$chars= '-ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789_';  
	srand((double)microtime()*1000000);  
	$rand='';
	for($i=0; $i<$len; $i++) {  
        $rand.= $chars[rand()%strlen($chars)];  
	}  
	return $rand;  
}
```

### List all the files in a directory
```php
function list_files($dir){
    if(is_dir($dir)){
        if($handle = opendir($dir)){
            while(($file = readdir($handle)) !== false){
                if($file != "." && $file != ".." && $file != "Thumbs.db"){
                    echo '<a target="_blank" href="'.$dir.$file.'">'.$file.'</a><br>'."\n";
                }
            }
            closedir($handle);
        }
    }
}
```

### Generate a readable random string
```php
function readable_string($len = 6){
    $consonants=array("b","c","d","f","g","h","j","k","l",  
            "m","n","p","r","s","t","v","w","x","y","z");  
    $vowels=array("a","e","i","o","u");  
    $randStr="";  
    srand ((double)microtime()*1000000);  
    $max = $len/2;  
    for($i=1; $i<=$max; $i++)  
    {  
    $randStr.=$consonants[rand(0,19)];  
    $randStr.=$vowels[rand(0,4)];  
    }  
    return $randStr;  
}
```

### Delete a directory and its contents
```php
function destroyDir($dir, $virtual = false){
    $ds = DIRECTORY_SEPARATOR;  
    $dir = $virtual ? realpath($dir) : $dir;  
    $dir = substr($dir, -1) == $ds ? substr($dir, 0, -1) : $dir;  
    if (is_dir($dir) && $handle = opendir($dir))  {  
        while ($file = readdir($handle))  {  
            if ($file == '.' || $file == '..')  {  
                continue;  
            }  
            elseif (is_dir($dir.$ds.$file))  {  
                destroyDir($dir.$ds.$file);  
            }  
            else  {  
                unlink($dir.$ds.$file);  
            }  
        }  
        closedir($handle);  
        rmdir($dir);  
        return true;  
    }  
    else{
        return false;  
    }
}
```

### Get real IP address of the user
```php
function getRealIpAddr(){
    if (!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else{
        $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
```

### Force a file to download
```php
function force_download($file){
    if ((isset($file)) && (file_exists($file))){
        header("Content-length: ".filesize($file));
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $file . '"');
        readfile("$file");  
    }else{
        echo "No file selected";  
    }
}
```

### Validate first and last name
```php
function validFirstLastName($name, $maxLen=100){

    $nameLen=strlen($name);
    if($nameLen>$maxLen || $nameLen==0){
        return false;
    }else{
        $nameParts=explode(' ', $name);
        if(count($nameParts)==2){
            $firstName=trim($nameParts[0]);
            $lastName=trim($nameParts[1]);
            if(strlen($firstName)>0 && strlen($lastName)>0){
                        
                if(preg_match("/^[a-zA-Z]*$/",$firstName) && preg_match("/^[a-zA-Z]*$/",$lastName)){
                    return true;
                }else{
                    return false;
                }
        
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
        
}
```

### Add th, st, nd, rd and th after a number
```php
function ordinal($num){
    $test_c = abs($num) % 10;
    $ext = ((abs($num) %100 < 21 && abs($num) %100 > 4) ? 'th'
            : (($test_c < 4) ? ($test_c < 3) ? ($test_c < 2) ? ($test_c < 1)
            ? 'th' : 'st' : 'nd' : 'rd' : 'th'));
    return $num.$ext;
}
```

### Convert minutes into hours and minutes
```php
function convertToHoursMins($time, $format = '%02d:%02d'){
    if ($time < 1) {
        return 0;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}
```

### Calculate difference b/w two dates
```php
function dateDiff($date1, $date2){
    $datetime1 = new DateTime($date1);
    $datetime2 = new DateTime($date2);
    $interval = $datetime1->diff($datetime2);
    return $interval->format('%H:%I');
}
```

### Calcute age, given date of birth
```php
function ageFinder($date){
    $time = strtotime($date);
    if($time === false){
        return '';
    }
         
    $year_diff = '';
    $date = date('Y-m-d', $time);
    list($year,$month,$day) = explode('-',$date);
    $year_diff = date('Y') - $year;
    $month_diff = date('m') - $month;
    $day_diff = date('d') - $day;
    if ($day_diff < 0 || $month_diff < 0) $year_diff--;
         
    return $year_diff;
}
```

### Check if the connection is HTTPS or HTTP
```php
function httpOrHttps(){
    // 1 for HTTPS and 0 for HTTP
    if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) {
        return 1;
    }else{
        return 0;
    }
}
```

### Generate random HEX color
```php
function randonHEX(){
    $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
    return '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
}
```

### Generate random Integer
```php
function getRandomId($min = NULL, $max = NULL) {
    if (is_numeric($min) && is_numeric($max)) {
            return mt_rand($min, $max);
    }
    else {
            return mt_rand();
    }
}
```

### Check if the current request is AJAX
```php
function isAjaxRequest(){
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
        return true;
    }else{
        return false;
    }
}
```

### Convert month number to name
```php
function monthNumberToName($num){
    if($num<1 || $num>12){
        return "ERROR";
    }
    return date("F", mktime(0, 0, 0, $num, 10));;
}
```

### Distance b/w coordinates (using Haversine Great Circle method)
```php
function haversineGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000) {
    // convert from degrees to radians
    $latFrom = deg2rad($latitudeFrom);
    $lonFrom = deg2rad($longitudeFrom);
    $latTo = deg2rad($latitudeTo);
    $lonTo = deg2rad($longitudeTo);
    $latDelta = $latTo - $latFrom;
    $lonDelta = $lonTo - $lonFrom;
    $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
        cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
    return $angle * $earthRadius;
}
```

### Distance b/w coordinates (using Vincenty Great Circle method)
```php
function vincentyGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000) {
    // convert from degrees to radians
    $latFrom = deg2rad($latitudeFrom);
    $lonFrom = deg2rad($longitudeFrom);
    $latTo = deg2rad($latitudeTo);
    $lonTo = deg2rad($longitudeTo);
    $lonDelta = $lonTo - $lonFrom;
    $a = pow(cos($latTo) * sin($lonDelta), 2) +
        pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
    $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);
    $angle = atan2(sqrt($a), $b);
    return $angle * $earthRadius;
}
```

### Unzip an archive
```php
function unzipArchive($file, $destinationFolder){
    $zip = new ZipArchive() ;
    if ($zip->open($file) !== TRUE) {
        die ('ERROR');
    }
    $zip->extractTo($destinationFolder);
    $zip->close();
}
```

### Check is an email is disposable
```php
function isDisposableEmail($email){            
    $disposable_list = array('drdrb.net', 'upliftnow.com', 'uplipht.com', 'venompen.com', 'veryrealemail.com', 'viditag.com', 'viewcastmedia.com', 'viewcastmedia.net', 'viewcastmedia.org', 'gustr.com', 'webm4il.in', 'wegwerfadresse.de', 'wegwerfemail.de', 'wetrainbayarea.com', 'wetrainbayarea.org', 'wh4f.org', 'whyspam.me', 'willselfdestruct.com', 'winemaven.in', 'wronghead.com', 'wuzup.net', 'wuzupmail.net', 'www.e4ward.com', 'www.gishpuppy.com', 'www.mailinator.com', 'wwwnew.eu', 'xagloo.com', 'xemaps.com', 'xents.com', 'xmaily.com', 'xoxy.net', 'yep.it', 'yogamaven.com', 'yopmail.fr', 'yopmail.net', 'ypmail.webarnak.fr.eu.org', 'yuurok.com', 'zehnminutenmail.de', 'zippymail.in', 'zoaxe.com', 'zoemail.org', 'inboxalias.com', 'koszmail.pl', 'tagyourself.com', 'whatpaas.com', 'emeil.in', 'azmeil.tk', 'mailfa.tk', 'inbax.tk', 'emeil.ir', 'crazymailing.com', 'mailimate.com');
    $domain = substr(strrchr($email, "@"), 1);
    if(in_array($domain, $disposable_list)){
        return true;
    }else{
        return false;
    }
}
```

### Extract source code of a web page
```php
function webSource($link){
    $lines = file($link);
    foreach ($lines as $line_num => $line) {
        echo htmlspecialchars($line);
    }
}
```

