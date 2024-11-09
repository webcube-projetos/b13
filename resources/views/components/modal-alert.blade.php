<!-- Modal Component -->
<div x-data="{
    warningModalIsOpen: false,
    message: '',
    title: 'Atenção'
}"
    @mostrar-erro.window="console.log($event.detail); warningModalIsOpen = true; message = $event.detail.message; title = $event.detail.title">

    <div x-cloak x-show="warningModalIsOpen" x-transition.opacity.duration.200ms
        x-trap.inert.noscroll="warningModalIsOpen" @keydown.esc.window="warningModalIsOpen = false"
        x-on:click.self="warningModalIsOpen = false"
        class="tw-fixed tw-inset-0 tw-z-30 tw-flex tw-items-end tw-justify-center tw-bg-black/20 tw-p-4 tw-pb-8 tw-backdrop-blur-md sm:tw-items-center lg:tw-p-8 tw-z-[9999]"
        role="dialog" aria-modal="true" aria-labelledby="warningModalTitle">
        <!-- Modal Dialog -->
        <div x-show="warningModalIsOpen" x-transition:enter="tw-transition tw-ease-out tw-duration-200 tw-delay-100"
            x-transition:enter-start="tw-opacity-0 tw-scale-50" x-transition:enter-end="tw-opacity-100 tw-scale-100"
            class="tw-flex tw-max-w-lg tw-flex-col tw-gap-4 tw-overflow-hidden tw-rounded-md tw-border tw-border-neutral-300 tw-bg-white tw-text-neutral-600 tw-z-[9999] tw-min-w-[400px]">
            <!-- Dialog Header -->
            <div
                class="tw-flex tw-items-center tw-justify-between tw-border-b tw-border-neutral-300 tw-bg-neutral-50/60 tw-px-4 tw-py-2">
                <div
                    class="tw-flex tw-items-center tw-justify-center tw-rounded-full tw-bg-amber-500/20 tw-text-amber-500 tw-p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="tw-size-6"
                        aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-8-5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0v-4.5A.75.75 0 0 1 10 5Zm0 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <button x-on:click="warningModalIsOpen = false" aria-label="close modal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor"
                        fill="none" stroke-width="1.4" class="tw-w-5 tw-h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <!-- Dialog Body -->
            <div class="tw-px-4 tw-text-center">
                <h3 id="warningModalTitle" class="tw-mb-2 tw-font-semibold tw-tracking-wide tw-text-neutral-900"
                    x-text="title"></h3>
                <p x-text="message"></p>
            </div>
            <!-- Dialog Footer -->
            <div class="tw-flex tw-items-center tw-justify-center tw-border-neutral-300 tw-p-4">
                <button x-on:click="warningModalIsOpen = false" type="button"
                    class="tw-w-full tw-cursor-pointer tw-whitespace-nowrap tw-rounded-md tw-bg-amber-500 tw-px-4 tw-py-2 tw-text-center tw-text-sm tw-font-semibold tw-tracking-wide tw-text-white tw-transition hover:tw-opacity-75 focus-visible:tw-outline focus-visible:tw-outline-2 focus-visible:tw-outline-offset-2 focus-visible:tw-outline-amber-500 active:tw-opacity-100 active:tw-outline-offset-0">
                    Fechar
                </button>
            </div>
        </div>
    </div>
</div>
