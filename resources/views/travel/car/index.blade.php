@extends('layouts.app')

@section('konten')
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                    <a href="/car/create/{{ $travel->id }}" type="button" class="btn btn-default">
                        <span class="btn-label"><i class="fa fa-plus"></i></span>
                    </a>
                </div>

                <table id="bootstrap-table" class="table">
                    <thead>
                    <th data-field="id" class="text-center">ID</th>
                    <th data-field="name" data-sortable="true">Car Name</th>
                    <th data-field="type" data-sortable="true">Brand</th>
                    <th data-field="color" data-sortable="true">Color</th>
                    <th data-field="cc" data-sortable="true">CC</th>
                    <th data-field="fuel" data-sortable="true">Fuel</th>
                    <th data-field="capacity" data-sortable="true">Max Passenger</th>
                    <th class="td-actions text-right">Actions</th>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                    @foreach($travel->car as $car)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $car->car_name }}</td>
                            <td>{{ $car->type }}</td>
                            <td><div class="warnabox" style="background-color: {{ $car->color }}"></div></td>
                            <td>{{ $car->car_cc }}</td>
                            <td>{{ $car->fuel_type }}</td>
                            <td>{{ $car->max_passenger }}</td>
                            <td>
                                <a rel="tooltip" title="View Car Image" target="_blank"
                                   class="btn btn-simple btn-info btn-icon table-action view"
                                   href="/img/travel/{{ $car->car_image }}">
                                    <i class="fa fa-image"></i>
                                </a>
                                <a rel="tooltip" title="See Rate"
                                   class="btn btn-simple btn-info btn-icon table-action view"
                                   href="/service/{{ $car->id }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a rel="tooltip" title="Delete This Travel"
                                   class="btn btn-simple btn-danger btn-icon table-action remove"
                                   href="/car/delete/{{ $car->id }}">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!--  end card  -->
        </div> <!-- end col-md-12 -->
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        var $table = $('#bootstrap-table');

        function operateFormatter(value, row, index) {
            return [
                '<a rel="tooltip" title="View" class="btn btn-simple btn-info btn-icon table-action view" href="javascript:void(0)">',
                '<i class="fa fa-image"></i>',
                '</a>',
                '<a rel="tooltip" title="Edit" class="btn btn-simple btn-warning btn-icon table-action edit" href="javascript:void(0)">',
                '<i class="fa fa-edit"></i>',
                '</a>',
                '<a rel="tooltip" title="Remove" class="btn btn-simple btn-danger btn-icon table-action remove" href="javascript:void(0)">',
                '<i class="fa fa-remove"></i>',
                '</a>'
            ].join('');
        }

        $().ready(function () {
            window.operateEvents = {
                'click .view': function (e, value, row, index) {
                    info = JSON.stringify(row);

                    swal('You click view icon, row: ', info);
                    console.log(info);
                },
                'click .edit': function (e, value, row, index) {
                    info = JSON.stringify(row);

                    swal('You click edit icon, row: ', info);
                    console.log(info);
                },
                'click .remove': function (e, value, row, index) {
                    console.log(row);
                    $table.bootstrapTable('remove', {
                        field: 'id',
                        values: [row.id]
                    });
                }
            };

            $table.bootstrapTable({
                toolbar: ".toolbar",
                clickToSelect: true,
                showRefresh: true,
                search: true,
                showToggle: true,
                showColumns: true,
                pagination: true,
                searchAlign: 'left',
                pageSize: 8,
                clickToSelect: false,
                pageList: [8, 10, 25, 50, 100],

                formatShowingRows: function (pageFrom, pageTo, totalRows) {
                    //do nothing here, we don't want to show the text "showing x of y from..."
                },
                formatRecordsPerPage: function (pageNumber) {
                    return pageNumber + " rows visible";
                },
                icons: {
                    refresh: 'fa fa-refresh',
                    toggle: 'fa fa-th-list',
                    columns: 'fa fa-columns',
                    detailOpen: 'fa fa-plus-circle',
                    detailClose: 'fa fa-minus-circle'
                }
            });

            //activate the tooltips after the data table is initialized
            $('[rel="tooltip"]').tooltip();

            $(window).resize(function () {
                $table.bootstrapTable('resetView');
            });


        });

    </script>

    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-46172202-1', 'auto');
        ga('send', 'pageview');

    </script>
@endsection