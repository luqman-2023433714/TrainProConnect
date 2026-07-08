<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-bold fs-4">
            TrainProConnect Dashboard
        </h2>
    </x-slot>

    <div class="container py-4">

        <div class="row g-4">

            <div class="col-md-3">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5>Courses</h5>
                        <h1>0</h1>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5>Trainers</h5>
                        <h1>0</h1>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-warning">
                    <div class="card-body">
                        <h5>Participants</h5>
                        <h1>0</h1>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-danger">
                    <div class="card-body">
                        <h5>Classes</h5>
                        <h1>0</h1>
                    </div>
                </div>
            </div>

        </div>

        <div class="card mt-4">
            <div class="card-header">
                Welcome
            </div>

            <div class="card-body">

                Welcome to TrainProConnect.

                Start managing your training centre here.

            </div>
        </div>

    </div>  

</x-app-layout>