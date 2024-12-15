<!-- prettier-ignore -->
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'mt-4 rounded-md bg-blue-600 text-white w-fit px-6 py-2 text-sm duration-200 hover:bg-blue-700']) }}>
    {{ $slot }}
</button>
