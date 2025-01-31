@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <style>
        /* <!-- CSS untuk Animasi --> */
        .fade-in-animation {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Card Animation */
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
    </style>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card progress-card transform transition duration-500 hover:scale-105">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">TIKET BARU</p><br>
                                    <h5 class="font-weight-bolder text-danger font-weight-bolder">
                                        {{ array_sum($dataProgres) }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card done-card transform transition duration-500 hover:scale-105">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">TIKET DONE</p><br>
                                    <h5 class="font-weight-bolder text-success font-weight-bolder">
                                        {{ array_sum($dataByStatus) }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card report-card transform transition duration-500 hover:scale-105">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">REPORT DATA</p><br>
                                    <h5 class="font-weight-bolder text-success font-weight-bolder">
                                        {{ array_sum($dataByMonth) }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div id="progress-content" class="fade-in-animation" style="display: none;">
            @include('admin.table-progres')
        </div>
        <div id="done-content" class="fade-in-animation" style="display: none;">
            @include('admin.tables-done')
        </div>
        <div id="grafik-content" class="fade-in-animation">
            @include('admin.grafik')
        </div>
    </div>
    @include('admin.modal')
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('.progress-card').on('click', function() {
                // show
                $('#progress-content').slideToggle();
            });
            $('.done-card').on('click', function() {
                // show
                $('#done-content').slideToggle();
            })
            $('.report-card').on('click', function() {
                // show 
                $('#grafik-content').slideToggle();
            });
        })
    </script>
@endpush
