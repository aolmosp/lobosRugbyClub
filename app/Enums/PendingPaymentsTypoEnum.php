<?php

namespace App\Enums;

enum PendingPaymentsTypoEnum: int
{
    case MENSUALIDAD = 1;
    case MENSUALIDAD_PARCIAL = 2;
    case TERCER_TIEMPO = 3;
    case LICENCIA = 4;
    case ENTRENAMIENTO = 5;
    case WO = 6;
    case DONACION = 7;
    case MATRICULA = 8;

    public function getDesc(): string
    {
        return match ($this) {
            self::MENSUALIDAD => 'Mensualidad',
            self::MENSUALIDAD_PARCIAL => 'Mensualidad parcial',
            self::TERCER_TIEMPO => 'Tercer tiempo',
            self::LICENCIA => 'Licencia',
            self::ENTRENAMIENTO => 'Entrenamiento',
            self::WO => 'Extra WO',
            self::DONACION => 'Donación',
            self::MATRICULA => 'Matricula',
        };
    }
}
