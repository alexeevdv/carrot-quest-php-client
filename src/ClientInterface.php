<?php

namespace alexeevdv\CarrotQuest;

interface ClientInterface
{
    public function userSetProperties(int $userId, array $properties, $isCarrotQuestUser = true): void;
}
