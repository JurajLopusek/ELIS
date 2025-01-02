@props(['disabled' => false, 'hasError' => false])

<input
    @disabled($disabled)
    {{ $attributes->merge([
        'class' => 'p-2 border-2 rounded-md shadow-sm transition-all outline-none
                    ' . ($hasError
                        ? 'border-red-500 focus:border-red-500'
                        : 'border-gray-light bg-gray-very-light dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 hover:border-blue-200 active:border-blue focus:border-blue-500 dark:focus:border-blue-600')
    ]) }}>



