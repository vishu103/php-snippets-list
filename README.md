# Introduction

This a well curated list of very useful php snippets which can help you in your projects. I will try to add more snippets daily or weekly.

*Here's the list of function available (Total - 21)*

### 1. Generate Random String
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
