<div>
    <div class="text-white">
        Select some cells and press 'next' to simulate next generation:
    </div>
    <div class="grid grid-cols-3 gap-1 text-center py-2 text-white">
        <a href="{{route('reset')}}">
            <button class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Reset
            </button>
        </a>
        <a href="{{route('rand')}}">
            <button class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Randomize
            </button>
        </a>
        <a href="{{route('next')}}">
            <button class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Next
            </button>
        </a>
    </div>
</div>