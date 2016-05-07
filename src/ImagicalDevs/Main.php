<?php

namespace ImagicalDevs;

use pocketmine\plugin\PluginBase;
use pocketmine\plugin\Plugin;
use pocketmine\utils\TextFormat as C;
use pocketmine\level\Level;
use pocketmine\utils\Config;
use pocketmine\level\Position;
use pocketmine\math\Vector3;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener {
  
  public function onEnable() {
      $this->registerPluginEvents($this, $this);
      $this->printOut(C::GREEN . "[MagicalAPI] Simple API Enabled!");
      $this->saveCfg("config.yml");
      $this->mkCfgDir();
      $this->config = new Config($this->getDataFolder(). "config.yml", Config::YAML);
  }
  
  public function onDisable() {
      $this->saveCfg("config.yml");
      $this->printOut(C::RED . "[MagicalAPI] Simple API Disabled!");
  }
  
  /*
   * API Functions
   */
   
  function name() {
    return $this->getName();
  }
  
  function randInt() {
    $rand = rand(1,1000);
    return $rand;
  }
  
  function serverName() {
    $name = $this->getServer()->getName();
    return $name;
  }
  
  function registerPluginEvents(Listener $listener, Plugin $plugin) {
      $ev = $this->getServer()->getPluginManager()->registerEvents($listener, $plugin);
      return $ev;
  }
  
  function printOut($message) :string {
      $msg = $this->getLogger()->info($message);
      return $msg;
  }
  
  function getPlayersInLvl($level) {
      $players = $this->getLevel()->getPlayers();
      return $players;
  }
  
  function mkCfgDir() {
      $mkdir = @mkdir($this->getDataFolder());
      return $mkdir;
  }
  
  function getXYZ() {
    $xyz = array (
      $this->getX(),
      $this->getY(),
      $this->getZ(),
    );
    return $xyz
  }
  
  function increase() {
    return $this++;
  }
  
  function decrease() {
    return $this--;
  }
  
  function saveCfg($cfg) :string {
    $config = $this->saveResource($cfg);
    return $config;
  }
  
  function sendMsgInLvl($msg, $level) :string {
    if($level instanceof Level){
      $lvl = $this->getServer()->getLevelByName($level);
      $players = $lvl->getPlayers();
      foreach($players as $p){
        $message = $p->sendMessage($msg);
        return $message;
      }
    }
  }
  
  function sendWarning($player, $msg) :string {
    if($player instanceof Player){
      return $player->sendMessage($msg);
    }
  }
  
  function players() {
    $players = $this->getServer()->getOnlinePlayers();
    return $players;
  }
  
}
