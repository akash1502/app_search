<?php

require_once 'vendor/autoload.php';

use Apache\Ignite\Client;
use Apache\Ignite\ClientConfiguration;
use Apache\Ignite\Type\ObjectType;
use Apache\Ignite\Cache\CacheEntry;
use Apache\Ignite\Exception\ClientException;

function performCacheKeyValueOperations(){
    $client = new Client();
    require_once 'conn.php';
    try {
        $client->connect(new ClientConfiguration('127.0.0.1:10800'));
        $cache = $client->getOrCreateCache('myCache')->setKeyType(ObjectType::INTEGER);
        // $cache->clear();
        // exit();
        $clientID ="";

        if(!empty($cache->get(1))){
            $value = $cache->get(1);
        }else{

            $sql = "SELECT * FROM quickbook_auth";
            $result = $conn->query($sql);
            if($row = $result->fetch_assoc()){
                $clientID = $row['access_token'];
            }

            $cache->put(1, $clientID);
            $value = $cache->get(1);
        }
        // put and get value

        echo "<br> Client ID --> $value";

    } catch (ClientException $e) {
        echo($e->getMessage());
    } finally {
        $client->disconnect();
    }
}

performCacheKeyValueOperations();