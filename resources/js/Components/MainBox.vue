<template>
    <div class="">
        <div class="flex flex-col gap-2">
            <div class="flex gap-2 items-center">
                <div
                    class="flex justify-center items-center bg-blue-200 size-12 rounded-2xl"
                >
                    <slot name="icon"></slot>
                </div>
                <h4 class="text-2xl font-normal"><slot name="title"></slot></h4>
            </div>
            <span class="text-sm text-gray-600"
                ><slot name="description"></slot
            ></span>
            <slot name="content"></slot>
        </div>
    </div>
</template>
