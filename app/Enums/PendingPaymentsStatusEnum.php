<?php

namespace App\Enums;

enum PendingPaymentsStatusEnum: int
{
    case PAGADO = 0;
    case PENDIENTE = 1;
    case ELIMINADO = 2;
}
