@extends('layout.app')

@section('main-content')
    @include('components.MainCategory.BroadCump')
    @include('components.MainCategory.List')
@endsection
@section('modals')
    @include('components.MainCategory.modal')
@endsection

@section('scripts')
    <script>
        let table = $('#ListTable')


        GetAll();

        function GetAll() {
            axios.get('/category/get-all')
                .then(function (response) {
                    if(response.status === 200){
                        let data = response.data;
                        table.empty();
                        data.forEach(function (item, index) {
                            TableRow(table, item, index);
                        })
                        $("#table-1").dataTable({
                            // dom: 'Bfrtip',
                            retrieve: true
                        });
                        $("#table-1").dataTable();
                    }
                })
                .catch(function (error) {
                    console.log(error)
                })
        }

        function TableRow(table, item, index) {
            table.append(`
                <tr>
                    <td>
                        4
                    </td>
                    <td>Input data</td>
                    <td class="align-middle">
                        <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                            <div class="progress-bar bg-success" data-width="100%"></div>
                        </div>
                    </td>
                    <td>
                        <img alt="image" src="{{asset("assets/img/avatar/avatar-2.png")}}" class="rounded-circle" width="35" data-toggle="tooltip" title="Rizal Fakhri">
                        <img alt="image" src="{{asset("assets/img/avatar/avatar-5.png")}}" class="rounded-circle" width="35" data-toggle="tooltip" title="Isnap Kiswandi">
                        <img alt="image" src="{{asset("assets/img/avatar/avatar-4.png")}}" class="rounded-circle" width="35" data-toggle="tooltip" title="Yudi Nawawi">
                        <img alt="image" src="{{asset("assets/img/avatar/avatar-1.png")}}" class="rounded-circle" width="35" data-toggle="tooltip" title="Khaerul Anwar">
                    </td>
                    <td>2018-01-16</td>
                    <td><div class="badge badge-success">Completed</div></td>
                    <td><a href="#" class="btn btn-secondary">Detail</a></td>
                </tr>
            `)
        }
    </script>
@endsection
