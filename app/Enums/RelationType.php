<?php
namespace App\Enums;

enum RelationType: string
{
    case Father = 'Father';
    case Mother = 'Mother';
    case Brother = 'Brother';
    case Sister = 'Sister';

    public static function getValues(): array
    {
        return array_column(RelationType::cases(), 'value');
    }
}
