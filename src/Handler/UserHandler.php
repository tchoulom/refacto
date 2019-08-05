<?php

namespace Refacto\Handler;

use Refacto\Entity\User;

class UserHandler
{
    /**
     * @param $text
     * @param User $user
     * @return mixed
     */
    public function doComputeText($text, User $user)
    {
        (strpos($text, '[user:first_name]') !== false) and $text = str_replace('[user:first_name]', ucfirst(mb_strtolower($user->getFirstname())), $text);

        return $text;
    }
}
