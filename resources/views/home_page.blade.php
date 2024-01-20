<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" class="css">

    <!--Remix Icon css--->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <!--jquery data table css--->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <!----Sweet alert Min css--->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.32/sweetalert2.min.css" />
    <!----fontawesome 4.7--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <!-- jQuery UI CSS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!-------Toastr css------>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>

    <title>Test</title>
</head>

<body>

    <div class="container">

        <style>
            .card-title {
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }
        </style>

        <div class="row mt-5">

            <div class="card">

                <div class="card-header">
                    <div class="card-title">
                        <h4>All Data</h4>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add
                            Data</button>
                    </div>
                </div>
                <div class="card-body">


                    <div class="table-responsive">

                        <table class="table table-bordered " id="test_data">

                            <thead>
                                <tr>
                                    <th>Srl.no.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Roll No</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($frontends as $all=>$frontend)
                                    <tr>
                                        <td>{{ $all++  }}</td>
                                        <td>{{ $frontend->name  }}</td>
                                        <td>{{ $frontend->email  }}</td>
                                        <td>{{ $frontend->roll }}</td>
                                        <td>
                                            <button class="btn btn-info" ><i class="ri-edit-2-line"></i></button>
                                            <button class="btn btn-danger" ><i class="ri-chat-delete-fill"></i></button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-----Modal start------->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <form action="">
                        @csrf

                        <div class="col-md-12 mb-3">
                            <div class="input-group add_batch">
                                <span class="input-group-text"><i class="ri-file-user-fill"></i></span>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Name" data-bs-toggle="tooltip" title=”Name”>
                                    <div class="invalid-feedback show" id="name_msg"> </div>
                            </div>

                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="input-group add_batch">
                                <span class="input-group-text"><i class="ri-file-user-fill"></i></span>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="email" data-bs-toggle="tooltip" title="Email">
                                    <div class="invalid-feedback show" id="email_msg"> </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="input-group add_batch">
                                <span class="input-group-text"><i class="ri-file-user-fill"></i></span>
                                <input type="email" class="form-control" id="roll" name="roll"
                                    placeholder="roll" data-bs-toggle="tooltip" title="roll">
                                    <div class="invalid-feedback show" id="roll_msg"></div>
                            </div>
                        </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary insert_data_btn">Save Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-----Modal Close------->





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery datatable -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <!----Axios cdn------->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <!--Sweet alert js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.32/sweetalert2.min.js"></script>
    <!--Validate js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
    <!--axios cdn-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        </script>

        <script>

            $(document).ready(function () {
                $('#test_data').DataTable();
            });


        </script>

        <script>

            $(document).ready(function(){

                $(document).on('click', '.insert_data_btn', function(e){
                        e.preventDefault();

                        let name = $('#name').val();
                        let email = $('#email').val();
                        let roll = $('#roll').val();

                        if (name === '') {
                            toastr.error('Please fill in the Name field');
                            return;
                        }

                        if (email === '') {
                            toastr.error('Please fill in the Email field');
                            return;
                        }

                        if (roll === '') {
                            toastr.error('Please fill in the Roll field');
                            return;
                        }

                        let formData= new FormData();
                        formData.append('name',name);
                        formData.append('email',email);
                        formData.append('roll',roll);


                    axios.post("{{ route('save_data') }}",formData)
                    .then(res=>{
                        console.log(res.data);

                        if(res.data.status == 'success'){
                            $('#exampleModal').modal('hide');
                            $('.table').load(location.href+ ' .table');
                            $('.add_batch input').val('');
                            toastr.success(res.data.message);
                        }else if(res.data.error){
                            var keys=Object.keys(res.data.error);

                            keys.forEach(function(d){
                              $('#'+d).addClass('is-invalid');
                              $('#'+d+'_msg').text(res.data.error[d][0]);
                              $('#'+d+'_msg').show();
                            })
                          }

                    })

                });
             });

        </script>




</body>

</html>
