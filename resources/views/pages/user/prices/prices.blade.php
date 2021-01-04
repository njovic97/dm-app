@extends('layouts.app')

@section('content')

    <div class="card row col-12 mx-0 p-4 border-radius">
        <div class="col-2 ml-auto addButtonContainer">
            <button id="addPriceBtn" class="btn btn-info mb-4 float-right">Add Price</button>
        </div>
        <div class="table-responsive">
            <table id="prices" class="display">
                <thead>
                <tr>
                    <th>Employee</th>
                    <th>Per Hour</th>
                    <th>Fixed</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($prices as $price)
                    <tr>
                        <td>{{$price->getEmployeeName()}}</td>
                        <td>{{$price->per_hour}}</td>
                        <td>{{$price->fixed}}</td>
                        <td>
                            <button class="btn bnt-sm rounded-circle btn-success m-auto removePrice"
                                    data-price-id="{{$price->id}}"><i class="fa fa-trash text-info"
                                                                      aria-hidden="true"></i>
                            </button>
                            <button class="btn bnt-sm rounded-circle btn-success m-auto editPriceBtn"
                                    data-price-id="{{$price->id}}"><i class="fa fa-pencil text-info"
                                                                      aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('modals.modal-addPrice')
    @include('modals.modal-edit-price')

    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous">
    </script>

    <script>

        $(document).ready(function () {

            $('#prices').DataTable({
                dom: 'fBlrtp',
                oLanguage: {
                    sProcessing: '<div class="dt-loader"></div>',
                    sSearch: '<i class="fa fa-search text-info dtSearchIcon mr-2" aria-hidden="true"></i>',
                },
                language: {
                    searchPlaceholder: "Search...",
                    lengthMenu: "Show:  _MENU_"
                },
            });

            $('#addPriceBtn').click(function () {
                $('#addPrice').modal('show');
            });

            $('.removePrice').click(function () {
                var price_id = $(this).attr('data-price-id');
                $.ajax({
                    url: '/prices/remove',
                    type: 'get',
                    data: {
                        price_id: price_id,
                    },
                    "_token": "{{ csrf_token() }}",
                    headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
                }).done(function () {
                    location.reload();
                });
            });

            $('.editPriceBtn').click(function () {
                var price_id = $(this).attr('data-price-id');
                $('#editPrice').modal('show');
                $('#editPrice').attr('data-price-id', price_id);
            });

        });

    </script>

@endsection
