<!DOCTYPE html>
<html>
<head> 
    @include('admin.css')

    <style>
        /* Make the table responsive */
        .table-container {
            width: 100%;
            overflow-x: auto; /* Enables horizontal scrolling if needed */
        }

        table {
            border: 1px solid skyblue;
            margin: auto;
            width: 100%; /* Table adjusts to screen size */
            min-width: 800px; /* Prevents excessive shrinking */
            border-collapse: collapse;
        }

        th, td {
            color: white;
            font-weight: bold;
            text-align: center;
            padding: 10px;
            border: 1px solid skyblue;
        }

        th {
            background-color: red;
            font-size: 18px;
        }

        td img {
            max-width: 100px;
            height: auto; /* Ensures image keeps its aspect ratio */
        }

        /* Ensure the page content fits the screen */
        .page-content {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        /* Responsive Design for Small Screens */
        @media screen and (max-width: 768px) {
            th, td {
                font-size: 14px;
                padding: 8px;
            }
            td img {
                max-width: 80px;
            }
        }
    </style>
</head>
<body>

    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <div class="table-container">
                    <table>
                        <tr>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Food Title</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Change Status</th>
                        </tr>

                        @foreach($data as $data)
                        <tr>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->phone}}</td>
                            <td>{{$data->address}}</td>
                            <td>{{$data->title}}</td>
                            <td>{{$data->quantity}}</td>
                            <td>{{$data->price}}</td>
                            <td>
                                <img src="food_img/{{$data->image}}" alt="Food Image">
                            </td>
                            <td>{{$data->delivery_status}}</td>
                            <td>
                                <a onclick="return confirm('Are you sure to change this')" 
                                   class="btn btn-info" href="{{url('on_the_way',$data->id)}}">On the Way</a>

                                <a onclick="return confirm('Are you sure to change this')" 
                                   class="btn btn-warning" href="{{url('delivered',$data->id)}}">Delivered</a>

                                <a onclick="return confirm('Are you sure to change this')" 
                                   class="btn btn-danger" href="{{url('canceled',$data->id)}}">Cancel</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- JavaScript files-->
    @include('admin.js')

</body>
</html>
