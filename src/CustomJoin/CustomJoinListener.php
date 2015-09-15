<?php

namespace CustomJoin;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;

class CustomJoinListener extends PluginBase implements Listener{
    private $plugin;

    public function __construct(Main $plugin){
        $this->plugin = $plugin;
    }

    public function onPlayerJoin(PlayerJoinEvent $event){
        $rank1 = $this->getConfig()->get("Rank1");
        $player = $event->getPlayer();
        $name = $player->getName();
        if($player->hasPermission("customjoin.command")){
            $this->getServer()->broadcastMessage("&2" . $rank1 . $name . " è entrato in partita"); //TODO: Da cambiare
        }
    }

    public function onPlayerQuit(PlayerQuitEvent $event){
        $player = $event->getPlayer();
        $name = $player->getName();
        $rank1 = $this->getConfig()->get("Rank1");

        if($player->hasPermission("customjoin.command")){}
            $this->getServer()->broadcastMessage("&e" . $rank1 . $name . " è uscito dalla partita"); //TODO: Da cambiare
            return true;
        }
    }