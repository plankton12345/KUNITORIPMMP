<?php

namespace plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;
use pocketmine\event\player\PlayerJoinEvent;


class KUNITORI extends PluginBase implements Listener{

function onEnable(){
	$this->KUNITORIAPI = $this->getServer()->getPluginManager()->getPlugin("KUNITORIAPI"); //定義
        $this->getLogger()->info(TextFormat::YELLOW."KUNITORIAPI");

        if(!file_exists($this->getDataFolder())){
			mkdir($this->getDataFolder(), 0744, true);
		}
		$this->config = new Config($this->getDataFolder() . "data.yml", Config::YAML,array());//Config生成
	}



public function set($username,$exp){
		$this->config = new Config($this->getDataFolder() . "data.yml", Config::YAML,array());//Config
		if($this->config->exists($username)){
			$this->config->set($username,$exp);
			$this->config->save();
		}else{
			$this->config->set($username,$exp);
			$this->config->save();
		}
	}
        
        public function get($username) {
		$this->config = new Config($this->getDataFolder() . "data.yml", Config::YAML,array());//Config
		if($this->config->exists($username)){
			return $this->config->get($username);
		}else{
			$this->config->set($username,0);
			$this->config->save();
			return 0;
		}
	}
            
        











?>