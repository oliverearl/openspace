<?php

declare(strict_types=1);

arch()->preset()->php();
arch()->preset()->laravel();
arch()->preset()->security();

arch()
    ->expect('App')
    ->toHaveMethodsDocumented()
    ->toHavePropertiesDocumented()
    ->toUseStrictEquality()
    ->toUseStrictTypes();

arch()
    ->expect('Database')
    ->toHaveMethodsDocumented()
    ->toHavePropertiesDocumented()
    ->toUseStrictEquality()
    ->toUseStrictTypes();

arch()
    ->expect('Tests')
    ->toHaveMethodsDocumented()
    ->toHavePropertiesDocumented()
    ->toUseStrictEquality()
    ->toUseStrictTypes();

arch()
    ->expect('App\Actions')
    ->toBeInvokable()
    ->ignoring('App\Actions\Fortify')
    ->toBeReadonly()
    ->ignoring('App\Actions\Fortify');

arch()
    ->expect('App\Models')
    ->toUseTrait('Illuminate\Database\Eloquent\Factories\HasFactory');

arch()
    ->expect('App\Repositories')
    ->toBeClasses()
    ->toHaveSuffix('Repository');

arch()
    ->expect('App\View\Components')
    ->toBeClasses()
    ->toExtend('Illuminate\View\Component');
