<div>
    <div class="text-white">
        Select some cells and press 'next' to simulate next generation:
    </div>
    <div class="grid grid-cols-3 gap-1 text-center py-2 text-white">
        <button
            class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
            hx-post="{{route('reset')}}"
            hx-target="#board"
            hx-swap="outerHTML"
        >
            <span>
                Reset
                <img class="htmx-indicator htmx-loading" src="/img/bars.svg"/>
            </span>
        </button>
        <button
            class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
            hx-post="{{route('rand')}}"
            hx-target="#board"
            hx-swap="outerHTML"
        >
            <span>
                Randomise
                <img class="htmx-indicator htmx-loading" src="/img/bars.svg"/>
            </span>
        </button>
        <button
            class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
            hx-post="{{route('next')}}"
            hx-target="#board"
            hx-swap="outerHTML"
        >
            <span>
                Next
                <img class="htmx-indicator htmx-loading" src="/img/bars.svg"/>
            </span>
        </button>
    </div>
</div>