<?php


namespace Ru\JumpSound;


use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJumpEvent;
use pocketmine\level\sound\AnvilBreakSound;
use pocketmine\level\sound\AnvilFallSound;
use pocketmine\level\sound\AnvilUseSound;
use pocketmine\level\sound\BlazeShootSound;
use pocketmine\level\sound\ClickSound;
use pocketmine\level\sound\DoorBumpSound;
use pocketmine\level\sound\DoorCrashSound;
use pocketmine\level\sound\DoorSound;
use pocketmine\level\sound\EndermanTeleportSound;
use pocketmine\level\sound\FizzSound;
use pocketmine\level\sound\GhastShootSound;
use pocketmine\level\sound\GhastSound;
use pocketmine\level\sound\LaunchSound;
use pocketmine\level\sound\PopSound;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use Ru\JumpSound\command\jumpCommand;

class JumpSound extends PluginBase implements Listener
{
    /**@var Config*/
    public $data;

    /**@var array*/
    public $db;

    /**@var self*/
    private static $instance;

    public function onEnable()
    {
        $this->data = new Config($this->getDataFolder()."a.yml",Config::YAML);
        $this->db = $this->data->getAll();

        if (!isset($this->db)){
            $this->db['jump'] = 0;
        }

        $this->getServer()->getPluginManager()->registerEvents($this,$this);
        $this->getServer()->getCommandMap()->register('jumpsound',new jumpCommand());
    }

    public function onDisable()
    {
        $this->data->setAll($this->db);
        $this->data->save();
    }

    public function onLoad()
    {
        self::$instance = $this;
    }

    public static function getInstance() : self
    {
        return self::$instance;
    }

    public function setJumpSound(int $sound)
    {
        $this->db['jump'] = $sound;
    }

    public function onJump(PlayerJumpEvent $event)
    {
        $player = $event->getPlayer();
        if (isset($this->db['jump'])){
            switch ($this->db['jump']) {
                case 1:
                    $player->getLevel()->addSound(new AnvilBreakSound($player->asVector3()), [$player]);
                    break;
                case 2:
                    $player->getLevel()->addSound(new AnvilFallSound($player->asVector3()), [$player]);
                    break;
                case 3:
                    $player->getLevel()->addSound(new AnvilUseSound($player->asVector3()), [$player]);
                    break;
                case 4:
                    $player->getLevel()->addSound(new BlazeShootSound($player->asVector3()), [$player]);
                    break;
                case 5:
                    $player->getLevel()->addSound(new ClickSound($player->asVector3()), [$player]);
                    break;
                case 6:
                    $player->getLevel()->addSound(new DoorBumpSound($player->asVector3()), [$player]);
                    break;
                case 7:
                    $player->getLevel()->addSound(new DoorCrashSound($player->asVector3()), [$player]);
                    break;
                case 8:
                    $player->getLevel()->addSound(new DoorSound($player->asVector3()), [$player]);
                    break;
                case 9:
                    $player->getLevel()->addSound(new EndermanTeleportSound($player->asVector3()), [$player]);
                    break;
                case 10:
                    $player->getLevel()->addSound(new FizzSound($player->asVector3()), [$player]);
                    break;
                case 11:
                    $player->getLevel()->addSound(new GhastShootSound($player->asVector3()), [$player]);
                    break;
                case 12:
                    $player->getLevel()->addSound(new GhastSound($player->asVector3()), [$player]);
                    break;
                case 13:
                    $player->getLevel()->addSound(new LaunchSound($player->asVector3()), [$player]);
                    break;
                case 14:
                    $player->getLevel()->addSound(new PopSound($player->asVector3()), [$player]);
                    break;
                default:
                    break;
            }
        }
    }

}