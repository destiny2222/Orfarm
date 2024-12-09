<div class="flex items-center space-x-2">
    @foreach ($getState() as $image)
        <img src="{{ $image }}" class="w-12 h-12 rounded-full" alt="Image" />
    @endforeach
</div>
