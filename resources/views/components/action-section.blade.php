<div {{ $attributes->
    merge(['class' => 'flex flex-col gap-6 w-full bg-white rounded-md
    border-[1px] border-slate-200 p-6 h-fit']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="">
            {{ $content }}
        </div>
    </div>
</div>
