<?php

namespace SIvanov;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\level\sound\ZombieInfectSound;
use pocketmine\level\particle\SmokeParticle;

class DeathGrave extends PluginBase implements Listener{
  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }
  public function onRespaawn(PlayerRespawnEvent $e){
    $p = $e->getPlayer();
     $p->sendMessage("Где ты умер появилась твоя могила, быстрее сломай ее чтобы получить некоторые вещи");
  }
  public function onDeath(PlayerDeathEvent $e){
    $p = $e->getPlayer();
    $x = $p->getX();
    $y = $p->getY();
    $z = $p->getZ();
    $this->getServer()->getLevelByName("world")->setBlockIdAt($x, $y, $z, 246);
    $p->getLevel()->addParticle(new SmokeParicle(new Vector3($x, $y +1, $z)));
 //TO DO
  }
}
