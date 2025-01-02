<?php

use Filament\Forms\Components\TextInput;

?>
<x-layouts.base>
    <div>
        <x-filament-panels::form>
            {{
                    TextInput::make('name')

            }}
        </x-filament-panels::form>

    </div>
</x-layouts.base>
