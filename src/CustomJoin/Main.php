<?php

/*

                    -== CustomJoin ==-
                -== by @ItalianDevs4PM ==-
(AryToNeX, xionbig, fycarman, Flavius12, luca28pet, XEmAX32)

*/

# Let's start!

namespace CustomJoin;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;

class Main extends PluginBase implements Listener{

  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->getLogger()->info(TextFormat::GREEN . "CustomJoin enabled!");
  }
  
  public function onDisable(){
    $this->getLogger()->info(TextFormat::RED . "CustomJoin disabled!");
  }
  
  public function onPlayerJoin(PlayerJoinEvent $event){
    $player = $event->getPlayer();
		  if($player->hasPermission("/* non so che mettere */"){
			  # neanche qui
		  }
  }

  public function onPlayerQuit(PlayerQuitEvent $event){
    $player = $event->getPlayer();
      if($player->hasPermission("/* non so che mettere */"){
        # neanche qui (x2) lol
      }
  }

}
