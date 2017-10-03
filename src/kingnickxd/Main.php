<?php
namespace kingnickxd;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{
    public function onEnable() {
        //$this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveDefaultConfig();
        $this->getLogger()->info("MentionPM by LeNick! (@mention)");
    }

    /**
     * @param PlayerChatEvent $event
     */
    public function onPlayerChat(PlayerChatEvent $event) {
        
        $message = $event->getMessage();
        $messageParts = explode(" ", $message);
        $player = $event->getPlayer();
        
        if(count($messageParts) > 1 AND $messageParts[0] == "@t") {
            
            foreach($this->getServer()->getOnlinePlayers() as $online){
             if($player->hasPermission("mention.team")) {
             $event->setCancelled(true);
              if($online->hasPermission("mention.team")) {
                 $ttc = $this->getConfig()->get("teamtag-color");
                 /*$att = array_shift($messageParts);
                 $msg = implode(" ", $messageParts);*/
                 $online->sendMessage("Â§7(Â§$ttc" . $this->getConfig()->get("team-mention-tag") . "Â§7) Â§7" . $player->getDisplayName() . "Â§$ttc Â»Â§f " . str_replace("@t ", "", $message) . "");
                 
        }
}else{
    $player->sendMessage("Â§c" . $this->getConfig()->get("no-perm-team") . "");
    $event->setCancelled(true);
}
    }
        }elseif(count($messageParts) > 1 AND $messageParts[0] == "@op") {
            foreach($this->getServer()->getOnlinePlayers() as $online){
                if($player->hasPermission("mention.op")) {
                $event->setCancelled(true);
                 if($online->hasPermission("mention.op")) {
                 $otc = $this->getConfig()->get("optag-color");
                 /*$att = array_shift($messageParts);
                 $msg = implode(" ", $messageParts);*/
                 $online->sendMessage("Â§7(Â§$otc" . $this->getConfig()->get("op-mention-tag") . "Â§7) Â§7" . $player->getDisplayName() . "Â§$otc Â»Â§f " . str_replace("@op ", "", $message) . "");
        }
    }else{
    $player->sendMessage("Â§c" . $this->getConfig()->get("no-perm-op") . "");
    $event->setCancelled(true);
}
    }
    }elseif(count($messageParts) > 1 AND $messageParts[0] == "@vip") {
            foreach($this->getServer()->getOnlinePlayers() as $online){
                if($player->hasPermission("mention.vip")) {
                $event->setCancelled(true);
                 if($online->hasPermission("mention.vip")) {
                 $vtc = $this->getConfig()->get("viptag-color");
                 /*$att = array_shift($messageParts);
                 $msg = implode(" ", $messageParts);*/
                 $online->sendMessage("Â§7(Â§$vtc" . $this->getConfig()->get("vip-mention-tag") . "Â§7) Â§7" . $player->getDisplayName() . "Â§$vtc Â»Â§f " . str_replace("@vip ", "", $message) . "");
        }
    }else{
    $player->sendMessage("Â§c" . $this->getConfig()->get("no-perm-vip") . "");
    $event->setCancelled(true);
}
    }
}elseif($messageParts[0] == "@lenick") {
            foreach($this->getServer()->getOnlinePlayers() as $online){
                 $event->setCancelled(true);
                 $player->sendMessage(" ");
                 $player->sendMessage("Â§a  MentionPM by LeNick :)");//Please do not remove Credits! :)
                 $player->sendMessage("Â§2  Website: dreambuild.de"); //Please do not remove Credits! :)
                 $player->sendMessage("Â§2  YouTube: LeNick (youtube.com/c/LeNick01)"); //Please do not remove Credits! :)
                 $player->sendMessage("Â§b  Discord: discord.gg/eewwVNZ");//Please do not remove Credits! :)
                 $player->sendMessage(" ");
}
}
    }
}
?>
