<?php

namespace App;

class GeneratePassword
{
    private $password;
    private $accumulator;
    private $sizeDefault;
    private $options;

    public function __construct()
    {
        $this->password = '';
        $this->accumulator = 0;
        $this->sizeDefault = 0;
        $this->options = [];
    }

    public function generate(int $size, bool $upperCase, bool $lowerCase, bool $number, bool $symbol): string
    {
        if (!$upperCase && !$lowerCase && !$number && !$symbol) {
            return "No data has been set";
        }

        $this->options = [
            $this->generateUpperCase() => $upperCase,
            $this->generateLowerCase() => $lowerCase,
            $this->generateNumber() => $number,
            $this->generateSymbol() => $symbol,
        ];


        $this->sizeDefault = strlen($this->generateUpperCase()) +
            strlen($this->generateLowerCase()) +
            strlen($this->generateNumber()) +
            strlen($this->generateSymbol());



        if ($size <= 0) {
            $size = $this->sizeDefault;
        }

        for ($i = 0; $this->accumulator < $size; $i++) {

            $this->accumulator = 0;

            foreach ($this->options as $key => $values) {

                $this->password .= $this->definePassword($values, $key);
            }

            $this->accumulator += strlen($this->password);
        }

        return "Password:: " . substr(str_shuffle($this->password), 0, $size);
    }


    private function generateUpperCase(): string
    {
        return implode("", range('A', 'Z'));
    }
    private function generateLowerCase(): string
    {
        return mb_strtolower($this->generateUpperCase());
    }
    private function generateNumber(): string
    {
        return implode('', range('0', '9'));
    }
    private function generateSymbol(): string
    {
        return "!@#$%&*_+=-";
    }
    private function definePassword(bool $option, $data): string
    {
        if ($option) {
            return  str_shuffle($data);
        }
        return '';
    }
}
