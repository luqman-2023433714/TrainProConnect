<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            Certificate Management
        </h2>
    </x-slot>

    <div class="container py-4">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h4>Certificate List</h4>

            <a href="{{ route('certificates.create') }}"
               class="btn btn-primary">

                + Add Certificate

            </a>

        </div>

        <table class="table table-bordered table-hover">

            <thead class="table-dark">

                <tr>

                    <th>ID</th>
                    <th>Certificate No</th>
                    <th>Participant</th>
                    <th>Course</th>
                    <th>Issue Date</th>
                    <th>Status</th>
                    <th width="180">Action</th>

                </tr>

            </thead>

            <tbody>

            @forelse($certificates as $certificate)

                <tr>

                    <td>{{ $certificate->id }}</td>

                    <td>{{ $certificate->certificate_no }}</td>

                    <td>{{ $certificate->enrollment->participant->participant_name }}</td>

                    <td>{{ $certificate->enrollment->trainingClass->course->course_name }}</td>

                    <td>{{ $certificate->issue_date }}</td>

                    <td>{{ $certificate->status }}</td>

                    <td>

                        <a href="{{ route('certificates.edit',$certificate) }}"
                           class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('certificates.destroy',$certificate) }}"
                              method="POST"
                              style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this certificate?')">

                                Delete

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7" class="text-center">

                        No certificate available.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</x-app-layout>