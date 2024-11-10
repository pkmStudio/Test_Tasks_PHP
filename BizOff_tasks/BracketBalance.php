<?php

class BracketBalance
{
    public string $stringOfPHP;

    public function __construct(string $stringOfPHP)
    {
        $this->stringOfPHP = $stringOfPHP;
    }

    private function checkString(): bool
    {
        $str = $this->stringOfPHP;
        $strArray = str_split($str);
        $stack = 0;
        foreach ($strArray as $str) {
            if ($str == '}') {
                $stack--;
            }
            if ($stack < 0) {
                return false;
            }
            if ($str == '{') {
                $stack++;
            }
        }
        return $stack == 0;
    }

    public function getIsCorrectString(): bool
    {
        return $this->checkString();
    }
}
