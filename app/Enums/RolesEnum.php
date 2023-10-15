<?php

namespace App\Enums;

use ArchTech\Enums\InvokableCases;
use ArchTech\Enums\Options;
use ArchTech\Enums\Names;
use ArchTech\Enums\Values;
use ArchTech\Enums\From;
use ArchTech\Enums\Metadata;
use ArchTech\Enums\Meta\Meta;
use App\Enums\MetaProperties\{Description};

#[Meta(Description::class)]
enum RolesEnum: string
{
    use InvokableCases, Options, Names, Values, From, Metadata;

    #[Description('Fejlesztő')]
    case DEVELOPER = 'fejlesztő';
    #[Description('Rendszergazda')]
    case ADMINISTRATOR = 'rendszergazda';
    #[Description('Felhasználó')]
    case USER = 'felhasználó';

}
