<?php

namespace Core\Commands;

use Core\Loader;

use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat as TF;

class Fly extends PluginCommand {
	
	private $main;

    public function __construct($name, Loader $main) {
		
        parent::__construct($name, $main);
        $this->main = $main;
		
    }
	
	public function execute(CommandSender $sender, string $commandLabel, array $args) {
		
		if(!$sender instanceof Player) {
			
			$sender->sendMessage(TF::BOLD . TF::DARK_GRAY . "(" . TF::RED . "!" . TF::DARK_GRAY . ") " . TF::RESET . TF::GRAY . "You must run this command in-game.");
			return true;
		
		}
		
		if(count($args) < 1) {
			
            $sender->sendMessage(TF::BOLD . TF::DARK_GRAY . "(" . TF::GOLD . "!" . TF::DARK_GRAY . ") " . TF::RESET . TF::GRAY . "§5Please use:  §d/fly (on/off)");
			return true;
			 
        }
		
		if($sender->hasPermission("vmcore.command.fly") || $sender->isOp()) {
				
			if($sender instanceof Player) {
					
				if(isset($args[0])) {
						
					switch($args[0]) {
							
						case "on":
							
						$sender->setAllowFlight(true);
						$sender->sendMessage(TF::BOLD . TF::DARK_GRAY . "(" . TF::GREEN . "!" . TF::DARK_GRAY . ") " . TF::RESET . TF::GRAY . "§bYour ability to fly was enabled.");
						return true;
						break;
							
						case "off":
							
						$sender->setAllowFlight(false);
						$sender->sendMessage(TF::BOLD . TF::DARK_GRAY . "(" . TF::RED . "!" . TF::DARK_GRAY . ") " . TF::RESET . TF::GRAY . "§3Your ablitiy to fly was disabled.");
						return true;
						break;
							
					}
				}
			}
		}
		
		if(!$sender->hasPermission("vmcore.command.fly")) {
					
			$sender->sendMessage(TF::BOLD . TF::DARK_GRAY . "(" . TF::RED . "!" . TF::DARK_GRAY . ") " . TF::RESET . TF::GRAY . "§6You don't have permission to use this command.");
			return true;	
		}
	}
}
