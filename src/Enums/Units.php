<?php

declare(strict_types=1);

namespace pointybeard\LaravelUnitConverter\Enums;

enum Units: string
{
    // Unit systems
    case METRIC = 'metric';
    case IMPERIAL = 'imperial';

    // Mass units
    case MG = 'mg';
    case G = 'g';
    case KG = 'kg';
    case LB = 'lb';
    case OZ = 'oz';

    // Length units
    case MM = 'mm';
    case CM = 'cm';
    case M = 'm';
    case KM = 'km';
    case IN = 'in';
    case FT = 'ft';
    case YD = 'yd';
    case MI = 'mi';

    // Volume units
    case ML = 'ml';
    case L = 'l';
    case M3 = 'm3';
    case GAL = 'gal';
    case QT = 'qt';

    // Area units
    case MM2 = 'mm2';
    case CM2 = 'cm2';
    case M2 = 'm2';
    case KM2 = 'km2';
    case FT2 = 'ft2';
    case IN2 = 'in2';

    // Temperature units
    case C = 'c';
    case F = 'f';
    case K = 'k';

    // Speed units
    case MS = 'm/s';
    case KMH = 'km/h';
    case MPH = 'mph';
    case KN = 'kn';
}
