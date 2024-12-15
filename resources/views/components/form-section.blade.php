@props(['submit'])

<div
    class="flex flex-col gap-6 w-full xl:w-[calc(50%-12px)] bg-white rounded-md border-[1px] border-slate-200 p-6 h-fit"
>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div>
        <form wire:submit="{{ $submit }}">
            <div
                class=" {{
                    isset($actions)
                        ? 'sm:rounded-tl-md sm:rounded-tr-md'
                        : 'sm:rounded-md'
                }}"
            >
                <div class="grid grid-cols-6 gap-6">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
            <div class="flex items-center justify-start text-end">
                {{ $actions }}
            </div>
            @endif
        </form>
    </div>
</div>
