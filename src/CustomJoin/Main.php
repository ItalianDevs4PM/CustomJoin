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
    $name = $e->getPlayer->getName;
    $rank1 = $this->getConfig()->get("Rank1");
    $player = $event->getPlayer();
    $perm1 = $this->getConfig()->get("Perm1");
		  if($player->hasPermission("$perm1"){
			  foreach($this->getServer()->getPlayers() as $ps){
                          $ps->sendMessage(TextFormat::GREEN . " ".$rank $name." È entrato in partita");
/*Magari si può cambiare con setJoinMessage pero per ora mi sembra vada bene così poi dite voi :D */
		  }
           }
  }

  public function onPlayerQuit(PlayerQuitEvent $event){
    $player = $event->getPlayer();
    $name = $e->getPlayer->getName();
    $rank1 = $this->getConfig()->get("Rank1");
    $perm1 = $this->getConfig()->get("Perm1");
      if($player->hasPermission("$perm1"){
      foreach($this->getServer()->getOnlinePlayers as $ps){
      $ps->sendMessage(TextFormat::RED . " ".$rank $name." È uscito dalla partita");
       /*qui invece si può mettere setLeaveMessage anche se non ricordo se si chiamava così xD*/
      }
  }

}
