<?php

namespace Ru\JumpSound\command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use Ru\JumpSound\form\jumpForm;

class jumpCommand extends Command
{

    public function __construct()
    {
        parent::__construct('jumpsound', 'JumpSound', '/jumpsound', ['jumpsound']);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if (!$sender instanceof Player){
            $sender->sendMessage("인게임에서 사용해주세요!");
            return;
        }
        $sender->sendForm(new jumpForm());
    }

}