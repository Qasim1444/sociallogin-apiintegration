<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">PageSpeed Analysis</h3>

                <form method="POST" action="{{ route('pagespeed.analyze') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label for="url" class="block text-sm font-medium text-gray-700 mb-1">
                            Enter URL to analyze:
                        </label>
                        <input
                            type="url"
                            id="url"
                            name="url"
                            required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            placeholder="https://example.com"
                        >
                    </div>
                    <div>
                        <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Analyze
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</x-app-layout>
