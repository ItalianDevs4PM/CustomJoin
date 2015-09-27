<?php

namespace CustomJoin;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\utils\Config;

class CustomJoinListener extends PluginBase implements Listener{
    private $plugin;
    private $playerconfig;

    public function __construct(Main $plugin, CustomJoinListener $playerconfig){
        $this->plugin = $plugin;
        $this->playerconfig = $playerconfig;
    }

    public function onPlayerJoin(PlayerJoinEvent $event){
        $rank1 = "[Regular]";
        $player = $event->getPlayer();
        $name = $player->getName();
        if (!file_exists($this->getDataFolder() . "/players" . strtolower($name) . ".yml")){
            @mkdir($this->getDataFolder() . "/players");

            $playerconfig = new Config($this->getDataFolder() . "/players" . strtolower($name) . ".yml", Config::YAML,
                [
                  "JoinMessage" => $rank1 . $name . " joined the game.",
                    "LeaveMessage" => $rank1 . $name . " left the game."
                ]);
        }
        $event->setJoinMessage($this->playerconfig->getConfig()->get("JoinMessage")); //TODO: Da sistemare configurazione dei rank
    }

    public function onPlayerQuit(PlayerQuitEvent $event){
        $player = $event->getPlayer();
        $name = $player->getName();
        $playerconfig = $this->getDataFolder() . "/players" . strtolower($name) . ".yml";
        $event->setQuitMessage($this->playerconfig->getConfig()->get("LeaveMessage"));
    }
}
