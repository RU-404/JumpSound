<?php
namespace Ru\JumpSound\form;

use pocketmine\form\Form;
use pocketmine\Player;
use Ru\JumpSound\JumpSound;

class jumpForm implements Form
{

    public function jsonSerialize()
    {
        return[
            'type' => 'form',
            'title' => '§l§fJUMPSOUND',
            'content' => "점프할때 날 소리를 선택해주세요!\n",
            'buttons' => [
                [
                    'text' => "§lANVILBREAKSOUND"
                ],
                [
                    'text' => '§lANVILFALLSOUND'
                ],
                [
                    'text' => '§lANVILUSESOUND'
                ],
                [
                    'text' => '§lBLAZESHOOTSOUND'
                ],
                [
                    'text' => '§lCLICKSOUND'
                ],
                [
                    'text' => '§lDOORBUMPSOUND'
                ],
                [
                    'text' => '§lDOORCRASHSOUND'
                ],
                [
                    'text' => '§lDOORSOUND'
                ],
                [
                    'text' => '§lENDERMANSOUND'
                ],
                [
                    'text' => '§lFIZZSOUND'
                ],
                [
                    'text' => '§lGHASTSHOOTSOUND'
                ],
                [
                    'text' => '§lGHASTSOUND'
                ],
                [
                    'text' => '§lLAUNCHSOUND'
                ],
                [
                    'text' => '§lPOPSOUND'
                ],
                [
                    'text' => '§lRESET'
                ]
            ]
        ];
    }

    public function handleResponse(Player $player, $data): void
    {
        JumpSound::getInstance()->setJumpSound($data + 1);
        if ($data === 14) $player->sendMessage("§b[ §f!§b ] §f정상적으로 리셋되었습니다!");
        else $player->sendMessage("§b[ §f!§b ] §f정상적으로 적용되었습니다!");
    }

}