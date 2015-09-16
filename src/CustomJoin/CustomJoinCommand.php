<?php

namespace CustomJoin;

use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;

class CustomJoinCommand extends PluginBase implements CommandExecutor{
    private $plugin;

    public function __construct(Main $plugin){
       $this->plugin = $plugin;
    }

    public function onPlayerCommand(CommandSender $sender, Command $cmd, $label, array $args){

        $playerconfig = $this->getDataFolder() . "/players" . $sender->getName() . ".yml";

        if($cmd->getName() == "customjoin" && isset($args[0])){
            $args[0] = strtolower($args[0]);
            if($args[0] == "help"){
                if($sender->hasPermission("customjoin.command.help")){
                    //TODO: Mettere i comandi disponibili, vedere plugin.yml
                }else{
                    $sender->sendMessage("&4You don't have permission to use this command.");
                }
                return true;
            }
            if($args[0] == "info"){
                if($sender->hasPermission("customjoin.command.info")){
                    $sender->sendMessage("&6&l<<<CustomJoin v" . $this->getDescription()->getVersion(). " >>>");
                    $sender->sendMessage("&2Plugin created by ItalianDevs4PM (C)");
                }else{
                    $sender->sendMessage("&4You don't have permission to use this command.");
                }
                return true;
            }
            if($args[0] == "set"){
                if($sender->hasPermission("customjoin.command.set")){
                    if($args[1] == "join"){
                        $args[2] = $playerconfig->set("JoinMessage");
                        $playerconfig->save(true);
                        $playerconfig->reload();
                   }elseif($args[1] == "leave"){
                        $args[2] = $playerconfig->set("LeaveMessage");
                        $playerconfig->save(true);
                        $playerconfig->reload();
                   }
                }else{
                    $sender->sendMessage("&4You don't have permission to use this command.");
                }
                return true;
            }
            //TODO: Continuare

        }
        return false;

    }
}