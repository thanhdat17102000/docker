<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header text-center text-white h3 bg-info">Quản lý khách hàng</div>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('success')}}
            </div>
            @endif
            <div class="card-body">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
                    Thêm khách hàng
                </button>


                <!-- The Modal -->
                <form action="{{route('customer.store')}}" class="modal" id="myModal" method="POST">
                    @csrf

                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header bg-info text-white">
                                <h4 class="modal-title">Thêm khách hàng</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Tên khách hàng:</label>
                                    <input type="text" class="form-control" placeholder="" id="" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="">Địa chỉ:</label>
                                    <input type="text" class="form-control" placeholder="" id="" name="address">
                                </div>
                                <div class="form-group">
                                    <label for="">Số điện thoại:</label>
                                    <input type="text" class="form-control" placeholder="" id="" name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="">Ngày sinh:</label>
                                    <input type="date" class="form-control" placeholder="" id="" name="birthday">
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info">Thêm</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                            </div>

                        </div>
                    </div>
                </form>
                <!-- List khách hàng  -->

                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Ngày sinh</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customerList as $customer)
                        <tr>
                            <th scope="row"><?=$customer->id?></th>
                            <td><?=$customer->name?></td>
                            <td><?=$customer->address?></td>
                            <td><?=$customer->phone?></td>
                            <td><?=$customer->birthday?></td>
                            <td>
                                <a href="{{route('customer.edit',$customer->id)}}" class="btn btn-info">Sửa</a>
                                <a href="{{url('/customer',['id' => $customer->id])}}" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">Footer</div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
