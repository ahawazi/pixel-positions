<x-site-layout>
    <x-page-heading>New Job</x-page-heading>

    <form action="{{ route('job.store') }}" method="POST" class="max-w-2xl mx-auto space-y-6">
        @csrf

        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" placeholder="CTO" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="salary" :value="__('Salary')" />
            <x-text-input id="salary" class="block mt-1 w-full" type="text" name="salary" :value="old('salary')" required autocomplete="salary" placeholder="$90,000 USD" />
            <x-input-error :messages="$errors->get('salary')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="location" :value="__('Location')" />
            <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')" required autocomplete="location" placeholder="Winter Park" />
            <x-input-error :messages="$errors->get('location')" class="mt-2" />
        </div>

        <div class="mt-1">
            <x-input-label for="schedule" :value="__('Schedule')" />
            <select name="schedule" id="schedule" class="rounded-xl text-white bg-gray-700 border border-white/10 px-5 py-4 w-full">
                <option>Part Time</option>
                <option>Full Time</option>
            </select>
            <x-input-error :messages="$errors->get('schedule')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="url" :value="__('URL')" />
            <x-text-input id="url" class="block mt-1 w-full" type="text" name="url" :value="old('url')" required autocomplete="url" placeholder="https://acme.com/jobs/ceo-wanted" />
            <x-input-error :messages="$errors->get('url')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="featured" :value="__('Featured')" />
            <x-text-input id="featured" class="block mt-1 w-full" type="text" name="featured" :value="old('featured')" required autocomplete="featured" placeholder="Feature (Costs Extra)" />
            <x-input-error :messages="$errors->get('featured')" class="mt-2" />
        </div>

        <x-divider />

        <div>
            <x-input-label for="tags" :value="__('Tags (comma separated)')" />
            <x-text-input id="tags" class="block mt-1 w-full" type="text" name="tags" :value="old('tags')" required autocomplete="tags" placeholder="laracasts, video, education" />
            <x-input-error :messages="$errors->get('tags')" class="mt-2" />
        </div>

        <button class="bg-blue-800 rounded py-2 px-6 font-bold">
            Publish
        </button>

    </form>

</x-site-layout>
