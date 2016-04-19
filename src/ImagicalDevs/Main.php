<?php

namespace ImagicalDevs;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as C;
use pocketmine\utils\Config;
use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\math\Vector3;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\event\Listener;

class Main extends PluginBase {
  
  public function onEnable() {
    $this->registerPluginEvents();
  }
  
  // API Functions
  function registerPluginEvents() {
    $ev = $this->getServer()->getPluginManager()->registerEvents($this,$this);
    return $ev;
  }
}
