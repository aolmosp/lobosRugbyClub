<?php

namespace App\Enums;

enum PaymentsEnum: int
{
    case MENSUALIDAD = 0;
    case TERCER_TIEMPO = 1;
    case LICENCIA = 2;
    case INSCRPCION = 3;

    public function getAmount(): string
    {
        return match ($this) {
            self::MENSUALIDAD => 20000,
            self::TERCER_TIEMPO => 5000,
            self::LICENCIA => 45000,
            self::INSCRPCION => 20000,
        };
    }
    
}
