<?php

namespace App\Enums;

enum PendingPaymentsStatusEnum: int
{
    case PAGADO = 2;
    case PENDIENTE = 1;
    case ELIMINADO = 0;

    public function getDesc(): string
    {
        return match ($this) {
            self::PAGADO => 'PAGADO',
            self::PENDIENTE => 'PENDIENTE',
            self::ELIMINADO => 'ELIMINADO',
        };
    }
}
