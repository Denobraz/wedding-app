@props([
    'type' => 'primary',
    'size' => 'md',
    'tag' => 'button',
])
<{{$tag}} @class([
    'rounded-full font-semibold transition duration-300 border-2 leading-5 inline-block text-center',

    'bg-orange-100 border-orange-100 text-black hover:bg-orange-200 hover:border-orange-200' => $type === 'primary',
    'border-orange-100 text-white hover:bg-orange-200 hover:border-orange-200 hover:text-black' => $type === 'primary-outline',
    'bg-black border-black text-white hover:text-black hover:bg-orange-100 hover:border-orange-100' => $type === 'dark',
    'bg-red-500 border-red-500 text-white hover:bg-red-600 hover:border-red-600' => $type === 'danger',
    'border-red-500 text-red-500 hover:bg-red-500 hover:text-white' => $type === 'danger-outline',
    //success
    'bg-green-500 border-green-500 text-white hover:bg-green-600 hover:border-green-600' => $type === 'success',
    'border-green-500 text-green-500 hover:bg-green-500 hover:text-white' => $type === 'success-outline',

    'bg-gray-500 text-black' => $type === 'secondary',

    'px-4 py-1' => $size === 'sm',
    'text-sm' => $size === 'sm',

    'px-4 py-2' => $size === 'md',

    'px-6 py-3' => $size === 'lg',
    'text-lg' => $size === 'lg',
    $attributes->get('class'),
]) {{ $attributes }}>
    {{ $slot }}
</{{$tag}}>
