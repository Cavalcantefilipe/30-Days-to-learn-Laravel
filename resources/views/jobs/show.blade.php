<x-layout>
    <x-slot:heading>
        Job Details: {{ $job->title }}
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $job->title }}</h2>

    <p class="">
        this job pays {{ $job->salary }} per year.
    </p>

    @can('edit', $job)
        <p class="mt-6">
            <x-button href="/jobs/{{ $job->id }}/edit">Edit job</x-button>
        </p>
    @endcan
</x-layout>
