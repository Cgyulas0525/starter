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
enum LogTypeEnum: string
{
    use InvokableCases, Options, Names, Values, From, Metadata;

    #[Description('VMI')]
    case LOGIN = 'login';
    #[Description('VMI')]
    case LOGOUT = 'logout';
    #[Description('VMI')]
    case INSERT = 'insert';
    #[Description('VMI')]
    case MODIFY = 'modify';
    #[Description('VMI')]
    case DELETE = 'delete';
    #[Description('VMI')]
    case ACTIVATE = 'activate';
    #[Description('VMI')]
    case DEACTIVATE = 'deactivate';
    #[Description('VMI')]
    case VALIDATE = 'validate';

}
