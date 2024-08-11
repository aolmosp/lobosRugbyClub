<?php

namespace App\Enums;

enum PlayerStatusEnum: int
{
    case ACTIVO = 1;
    case INACTIVO = 0;
    case LESIONADO = 2;

    public function toString(): string
    {
        return match ($this) {
            self::ACTIVO => 'activo',
            self::INACTIVO => 'inactivo',
            self::LESIONADO => 'lesionado',
        };
    }
}
