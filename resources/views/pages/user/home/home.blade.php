@extends('layouts.app')

@section('content')

    <div class="card col-12 border-radius mb-5">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-4 text-center">
                    <span class="text-muted mr-2">Employees Quick Add: </span>
                    <button type="button" id="addEmployeeBtn2" class="btn bnt-sm rounded-circle btn-success m-auto"><i
                            class="fa fa-plus text-info"
                            aria-hidden="true"></i></button>
                </div>
                <div class="col-4 text-center">
                    <span class="text-muted mr-2">Jobs Quick Add: </span>
                    <a href="/jobs/create" class="btn bnt-sm rounded-circle btn-success m-auto"><i
                            class="fa fa-plus text-info"
                            aria-hidden="true"></i></a>
                </div>
                <div class="col-4 text-center">
                    <span class="text-muted mr-2">Prices Quick Add: </span>
                    <button type="button" id="addPriceBtn2" class="btn bnt-sm rounded-circle btn-success m-auto"><i
                            class="fa fa-plus text-info"
                            aria-hidden="true"></i></button>
                </div>


            </div>
        </div>
    </div>

    <div class="card col-6 border-radius home-main-card home-main-card-first">
        <div class="card-body statisticsCard">
            <h4 class="card-title"><i class="fa fa-bar-chart mr-2 text-info" aria-hidden="true"></i> Statistics</h4>
            <div class="card-body">
                <canvas id="myChart" width="400" height="400"></canvas>
            </div>
        </div>
    </div>

    <div class="card col-6 border-radius home-main-card">
        <div class="card-body">
            <h4 class="card-title pb-3"><i class="fa fa-file-text mr-2 text-danger" aria-hidden="true"></i> Description
                & Manual</h4>
            <div class="card-body p-0 text-muted">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque elementum sit amet orci vitae
                pellentesque. Vivamus congue tellus ut nunc pulvinar, at tincidunt lectus fringilla. Nulla ac felis sit
                amet diam vehicula facilisis sit amet non orci. Vestibulum dapibus molestie posuere. Nullam luctus
                lectus dui, a imperdiet ligula sodales vehicula. Nunc iaculis sed sem vehicula condimentum. Quisque
                sagittis dui sed sollicitudin rhoncus. Duis faucibus, elit at rutrum efficitur, orci dui hendrerit
                turpis, dignissim gravida orci urna quis ipsum. Integer lorem tellus, auctor vitae semper nec, aliquam
                ac nibh. Integer nisl nisl, vehicula ultricies nunc quis, ultricies condimentum lacus.

                Sed eu rhoncus tortor, nec porttitor turpis. Mauris vel erat faucibus, vehicula nunc ut, posuere tellus.
                Integer tortor nisl, mattis ut dignissim sit amet, venenatis ac ante. Suspendisse nisi metus, congue et
                auctor a, consequat ut libero. Integer tincidunt nunc lorem, vitae ultrices ex mattis nec. Praesent
                ornare diam faucibus est placerat commodo. Mauris nec eros sit amet eros varius blandit vel dapibus mi.
                Nullam sapien metus, gravida sit amet erat at, tristique fringilla felis. Maecenas pretium odio quam, id
                tincidunt mauris hendrerit ut. Vivamus elementum mauris eu tincidunt convallis. Mauris ut ultricies
                justo. Etiam sit amet consequat elit. Praesent non nisi ultricies, molestie nisi vitae, hendrerit metus.
                Mauris pulvinar, dolor nec eleifend vestibulum, magna sapien congue justo, ac euismod diam nunc sed
                tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque imperdiet odio elit.
            </div>
        </div>
    </div>

    @include('modals.modal-addEmployee')
    @include('modals.modal-addPrice')

    <script>

        $(document).ready(function () {
            showLoader({el: '.statisticsCard', background: 'rgb(255 255 255);', color: "#c38d9e", destroy: "false"});
            $.ajax({
                url: '/home/get-statistics',
                type: 'get',
                "_token": "{{ csrf_token() }}",
                headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            }).done(function (result) {
                var ctx = document.getElementById('myChart');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Employees', 'Jobs', 'Prices'],
                        datasets: [{
                            label: 'Count',
                            data: result.data,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
                hideLoader()
            });

            $('#addEmployeeBtn2').click(function () {
                $('#addEmployee').modal('show');
            });

            $('#addPriceBtn2').click(function () {
                $('#addPrice').modal('show');
            });
        });
    </script>

@endsection
