<?php

    class classFeed {
            
            private $feed = null;
        
            public function __construct($feed_url) {
                $this->loadFeed($feed_url); 
            }
        
            private function loadFeed($feed_url) {
                $curl = curl_init();
                curl_setopt_array($curl, [
                    CURLOPT_URL => $feed_url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_CUSTOMREQUEST => 'GET'
                ]);
        
                $response = curl_exec($curl);
                curl_close($curl);
        
                return $this->parseXML($response);
            }
        
            private function parseXML($response) {
                if(!strlen($response)) return false;      
                $this->feed = simplexml_load_string($response);
                return true;
            }
        
        
            public function getTitle() {
                return $this->feed->channel->title;
            }
        
            public function getDescription() {
                return $this->feed->channel->description;
            }
        
            public function getLastUpdate() {
                return date('d/m/Y à\s H:i:s',strtotime($this->feed->channel->lastBuildDate));
            }
    
            public function getItens() {
                return $this->feed->channel->item;
            }
        
        } 